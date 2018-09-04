<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Models\Module;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    var $title = 'Status';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Status::with('modules')->get()->toArray();
        $modules = Module::get()->toArray();
        return view('managements.status.index', compact('items', 'modules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            foreach($request->input('modules') as $module){
                $response = Status::firstOrCreate([
                    'title' => $request->input('title'),
                    'module_id' => $module
                ]);
            }
            Session::flash('success','New Status Added');
            return back();
        }
        catch (\Throwable $ex){
            return back()->with('failed', $ex->getMessage().' at Line '.$ex->getLine());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function show(Status $status)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function edit(Status $status)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Status $status)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function destroy(Status $status)
    {
        //
    }
}
