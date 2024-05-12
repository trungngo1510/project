<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\brand;
use App\Http\Requests\admin\BrandRequest;
class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = brand::all();
        return view('admin/brand/brand',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin/brand/add_brand');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BrandRequest $request)
    {
        $data = new brand;
        $data ->name = $request ->title;
        if($data->save()){
            return redirect()->back()->with('success',__('Add Brand Success.'));
          }else{
            return redirect()->back()->with('success',__('Add Brand Error.'));
          }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        brand::where('id',$id)->delete();
        return redirect()->back()->with('success',__('Delete Brand Success.'));
    }
}
