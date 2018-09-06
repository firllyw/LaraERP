<?php

namespace App\Http\Controllers\scm;

use App\Models\Supplier;
use App\Models\Material;
use App\Models\SupplierMaterial;
use App\Models\Status;
use App\Models\Country;
use App\Models\Province;
use App\Models\City;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Supplier::with('supplierMaterial','status')->get()->toArray();
        return view('scm.supplier.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items = ([
            'materials' => Material::get()->toArray(),
            'statuses' => Status::get()->toArray(),
            'countries' => Country::get()->toArray(),
            'provinces' => Province::get()->toArray(),
            'cities' => City::get()->toArray(),
        ]);
        return view('scm.supplier.form', $items);
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
            $supplier = Supplier::firstOrCreate($request->except(['_token','supplied_materials']));
            dd($supplier);
            foreach($request->input('supplied_material') as $material){
                SupplierMaterial::firstOrCreate([
                    'supplier_id' => $supplier,
                    'material_id' => $material,
                ]);
            }

            return redirect()->route('suppliers.index')->with('success', 'New Supplier Added');
        }
        catch(\Throwable $ex){
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
    public function edit($id)
    {
        $items = ([
            'supplier' => Supplier::with('supplierMaterial')->find($id)->toArray(),
            'materials' => Material::get()->toArray(),
            'statuses' => Status::get()->toArray(),
            'countries' => Country::get()->toArray(),
            'provinces' => Province::get()->toArray(),
            'cities' => City::get()->toArray(),
            'id' => $id,
        ]);
        $items['supplied'] = array();
        foreach($items['supplier']['supplier_material'] as $material){
            $items['supplied'][] = $material['material']['id'];
        }
        $items['supplied'] = array_combine($items['supplied'], $items['supplied']);

        return view('scm.supplier.form', $items);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        try{
            Supplier::find($id)->update($request->all());

            foreach($request->input('supplied_materials') as $material){
                SupplierMaterial::firstOrCreate([
                    'supplier_id' => $id,
                    'material_id' => $material,
                ]);
            }

            return redirect()->route('suppliers.index')->with('success', 'Supplier Updated');
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
