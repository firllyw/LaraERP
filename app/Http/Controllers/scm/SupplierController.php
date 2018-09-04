<?php

namespace App\Http\Controllers\scm;

use App\Models\Supplier;
use App\Models\Material;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Supplier::with('supplierMaterial')->get()->toArray();

        return view('scm.supplier.index', compact('items'));
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
            Supplier::firstOrCreate($request->all());

            return redirect()->route('supplier.index')->with('success', 'New Supplier Added');
        }
        catch(\Throawble $ex){
            return back()->with('failed', $ex->getMessage().' at Line '.$ex->getLine());
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $supplier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier)
    {
        try{
            Supplier::update($request->all());

            return redirect()->route('supplier.index')->with('success', 'Supplier Updated');
        }
        catch(\Throawble $ex){
            return back()->with('failed', $ex->getMessage().' at Line '.$ex->getLine());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Supplier $supplier)
    {
        try{
            Supplier::destroy($id);

            return redirect()->route('supplier.index')->with('success', 'Supplier Deleted');
        }
        catch(\Throawble $ex){
            return back()->with('failed', $ex->getMessage().' at Line '.$ex->getLine());
        }
    }
}
