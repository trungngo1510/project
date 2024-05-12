<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $getProduct = Product::orderBy('id')->limit(6)->get()->toArray();
        return response()->json([
            'reponse' => 'success',
            'data' => $getProduct
        ]);
    }
    //detail
    public function detail($id)
    {
        $data = Product::findOrFail($id);
        return response()->json([
            'response' => 'success',
            'data' => $data
        ]);
    }

    //product cart
    public function productCart(Request $request)
    {
        $data = $request->json()->all();

        $getProduct = [];

        foreach ($data as $item) {
            $product = Product::findOrFail($item['id']);

            $get = $product->toArray();
            $get['qty'] = $item['qty'];
            $getProduct[] = $get;
        }

        return response()->json([
            'response' => 'success',
            'data' => $getProduct
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }
}
