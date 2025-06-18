<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('pages.home');
    }

    public function create()
    {
        return view('pages.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_name'     => 'required|string|max:255',
            'qty_in_stock'     => 'required|integer|min:0',
            'price_per_item'   => 'required|numeric|min:0',
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Product data received successfully!',
            'data' => $validated
        ]);
    }

}
