<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
            'price_per_item' => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/'],        
        ]);

        $validated['id'] = Str::uuid();
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

    public function update(Request $request)
    {
        $id = $request->input('id');

        $validated = $request->validate([
            'product_name'   => 'required|string|max:255',
            'qty_in_stock'   => 'required|integer|min:0',
            'price_per_item' => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/'],
        ]);

        $products = session()->get('products', []);

        foreach ($products as $index => $product) {
            if ((string) $product['id'] === $id) {
                $products[$index]['product_name']   = $validated['product_name'];
                $products[$index]['qty_in_stock']   = $validated['qty_in_stock'];
                $products[$index]['price_per_item'] = $validated['price_per_item'];
                break;
            }
        }

        session(['products' => $products]);

        return response()->json([
            'status'  => 'success',
            'message' => 'Product updated successfully!',
            'data'    => $validated
        ]);
    }

    public function destroy(Request $request)
    {
        $id = $request->input('id'); 
        $products = session()->get('products', []);
        $filtered = array_filter($products, fn($product) => (string) $product['id'] != $id);
        session(['products' => array_values($filtered)]); 

        return response()->json(['status' => 'success', 'message' => 'Product deleted successfully']);
    }

}
