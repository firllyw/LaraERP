<?php

namespace App\Http\Controllers\Scm;

use App\Models\RequestOrder;
use App\Models\Status;
use App\Models\Material;
use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RequestOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = RequestOrder::with('supplier:id,title,phone', 'material:id,title', 'status:id,title')->get()->toArray();

        return view('scm.request.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items = ([
                'statuses' => Status::where('module_id', 3)->get()->toArray(),
                'materials' => Material::all()->toArray(),
                'suppliers' => Supplier::all()->toArray()
        ]);

        return view('scm.request.form' , $items);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $transformRequest = $request->except('_token', 'documents');
            if($request->hasFile('documents')){
                $file = Controller::uploadFile($request);
                $transformRequest = array_merge($request->except('_token', 'documents'), array('attachment'=>$file));
            }

            RequestOrder::firstOrCreate($transformRequest);
            /*
            Send Email To Supplier
            */
            return redirect()->route('requests.index')->with('success', 'New Request Applied');
        }
        catch(\Throwable $ex){
            return back()->with('failed', $ex->getMessage().' at Line '.$ex->getLine());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RequestOrder  $requestOrder
     * @return \Illuminate\Http\Response
     */
    public function show(RequestOrder $requestOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RequestOrder  $requestOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(RequestOrder $requestOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RequestOrder  $requestOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RequestOrder $requestOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RequestOrder  $requestOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(RequestOrder $requestOrder)
    {
        //
    }
}
