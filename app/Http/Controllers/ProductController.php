<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('id', 'asc')->paginate(10);
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_name' => 'required|string|max:255',
            'retail_price' => 'required|numeric|min:0',
            'wholesale_price' => 'required|numeric|min:0',
            'origin' => 'required|size:2',
            'quantity' => 'required|integer|min:0',
            'product_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $lastProduct = DB::table('products')->orderBy('id', 'desc')->first();
        $lastId = $lastProduct ? intval($lastProduct->id) : 0;
        $newId = str_pad($lastId + 1, 3, '0', STR_PAD_LEFT);

        $product = new Product();
        $product->id = $newId;
        $product->product_name = $validated['product_name'];
        $product->description = $request->input('description');
        $product->retail_price = $validated['retail_price'];
        $product->wholesale_price = $validated['wholesale_price'];
        $product->origin = $validated['origin'];
        $product->quantity = $validated['quantity'];

        if ($request->hasFile('product_image')) {
            $imagePath = $request->file('product_image')->store('images', 'public');
            $product->product_image = $imagePath;
        }

        $product->save();

        return redirect()->route('products.index')
            ->with('success', 'Product created successfully.');
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'product_name' => 'required|string|max:255',
            'retail_price' => 'required|numeric|min:0',
            'wholesale_price' => 'required|numeric|min:0',
            'origin' => 'required|size:2',
            'quantity' => 'required|integer|min:0',
            'product_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $product->product_name = $validated['product_name'];
        $product->description = $request->input('description');
        $product->retail_price = $validated['retail_price'];
        $product->wholesale_price = $validated['wholesale_price'];
        $product->origin = $validated['origin'];
        $product->quantity = $validated['quantity'];

        if ($request->hasFile('product_image')) {
            if ($product->product_image) {
                Storage::disk('public')->delete($product->product_image);
            }

            $imagePath = $request->file('product_image')->store('images', 'public');
            $product->product_image = $imagePath;
        }

        $product->save();

        return redirect()->route('products.index')
            ->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        if ($product->product_image) {
            Storage::disk('public')->delete($product->product_image);
        }

        $product->delete();

        return redirect()->route('products.index')
            ->with('success', 'Product deleted successfully.');
    }
}
