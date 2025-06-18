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
        $products = $this->productData();
        return view('pages.create', ['products' => $products]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_name'   => 'required|string|max:255',
            'qty_in_stock'   => 'required|integer|min:0',
            'price_per_item' => 'required|numeric|min:0',
        ]);

        $validated['created_at'] = now()->format('F d, Y');

        $products = session()->get('products', []);

        $products[] = $validated;

        // Save data in a session
        session(['products' => $products]);

        return response()->json([
            'status'  => 'success',
            'message' => 'Product saved successfully!',
            'data'    => $validated
        ]);
    }

    public function fetch()
    {
        return response()->json($this->productData());
    }

    // Central method to get all saved products from session 
    private function productData()
    {
        return session()->get('products', []);
    }
   
    // Renders the product rows partial using session data and returns the HTML as a JSON response for AJAX
    // PS: I personally don't like hardcoding HTML's in an AJAX syntax, so I decided to use Blade partials so Blade handles the looping, and view rendering
    public function fetchBlade()
    {
        $products = $this->productData();
        $html = view('partials.product-row', compact('products'))->render();

        return response()->json(['html' => $html]);
    }

    public function edit()
    {

    }

    public function delete()
    {
        
    }
}
