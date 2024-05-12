<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\product;

class SearchController extends Controller
{
    public function search_view()
    {

        return view('frontend.product.search-product');
    }

    public function search_product(Request $request)
    {
        $search = $request->search;

        $name = $request->name;
        $price = $request->price;
        $category = $request->category;
        $brand = $request->brand;
        $status = $request->status;

        $query = product::query();
        if (!empty($search)) {
            $query->where('name', 'LIKE', "%{$search}%");
        }
        if (!empty($name)) {
            $query->where('name', 'LIKE', "%{$name}%");
        }
        if (!empty($price)) {
            $price_n = explode('-', $price);
            $query->whereBetween('price', [$price_n[0], $price_n[1]]);
        }
        if (!empty($category)) {
            $query->where('id_category', $category);
        }
        if (!empty($brand)) {
            $query->where('id_brand', $brand);
        }
        if (!empty($status)) {
            $query->where('status', $status);
        }

        $search_product = $query->paginate(8);

        return view('frontend.product.search-product', compact('search_product'));
    }

    public function price_range(Request $request)
    {
        $price = $request->price_r;

        if ($price) {
            $price_r = explode(' : ', $price);

            $search_product = product::whereBetween('price', [$price_r[0], $price_r[1]])->get();

            return response()->json(['data' => $search_product]);
        }
    }
}
