<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    //
    public function index()
    {
        $products = Product::all();
        dd($products);
    }

    public function show(Product $product)
    {

        return view('product', [
            'product' => $product->load('category', 'ingredients', 'comments'),
        ]);
    }
}
