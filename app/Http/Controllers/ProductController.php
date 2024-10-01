<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Products::with('category')->get();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'required|image',
            'categories_id' => 'required|exists:categories,id',
        ]);

        $imagePath = $request->file('image')->store('images', 'public');

        Products::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $imagePath,
            'categories_id' => $request->categories_id,
        ]);

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    public function show(Products $product)
{
    return view('products.show', compact('product'));
}

public function showFront(Products $product)
{
    return view('products.detailfront', compact('product'));
}



    public function edit(Products $product)
    {
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Products $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'nullable|image',
            'categories_id' => 'required|exists:categories,id',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $product->update(['image' => $imagePath]);
        }

        $product->update($request->except('image'));

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Products $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
   
    public function displayProductByCategoryId($id)
    {
        $products = Products::where('categories_id', $id)->get();
        $category = Category::find($id); // Récupérer la catégorie par ID
        $categories = Category::all(); // Récupérer toutes les catégories

        return view('categories.showfront', compact('products', 'category', 'categories')); // Passer les produits, la catégorie et toutes les catégories
    }
    
    
}