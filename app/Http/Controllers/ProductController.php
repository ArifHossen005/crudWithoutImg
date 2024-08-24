<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    
    // Show the form for creating a new product
    public function create()
    {
        return view('products.add');
    }

    // Store a newly created product in storage
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
        ]);

        Product::create($request->all());

        return redirect()->route('products.manage')->with('success', 'Product created successfully.');
    }

  


    // Display a listing of the products
    public function manage()
    {
        $products = Product::all();
        return view('products.manage', compact('products'));
    }


    // Show the form for editing the specified product
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    // Update the specified product in storage
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
        ]);

        $product->update($request->all());

        return redirect()->route('products.manage')->with('success', 'Product updated successfully.');
    }

    // Remove the specified product from storage
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.manage')->with('success', 'Product deleted successfully.');
    }
}
