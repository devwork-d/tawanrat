<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();

        //search
        if ($request->has('search') && $request->search != '') {
            $query->where('name', 'LIKE', '%' . $request->search . '%');
        }

        //type
        if ($request->has('type') && $request->type != '') {
            $query->where('type', $request->type);
        }

        $products = $query->paginate(10);
        return view('index', compact('products'));
    }


    //สร้างสินค้า
    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'amount' => 'required|integer',
            'type' => 'required|string',
        ]);
        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'amount' => $request->amount,
            'type' => $request->type,
            'created_at' => now(),
        ]);
        return redirect()->route('product.index')->with('success', 'Product created successfully.');
    }


    //แก้ไขสินค้า
    public function edit(Product $product)
    {
        return view('edit')->with('product', $product);
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'amount' => 'required|integer',
            'type' => 'required|string',
        ]);
        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'amount' => $request->amount,
            'type' => $request->type,
            'updated_at' => now(),
        ]);
        return redirect()->route('product.index')->with('success', 'Product has been updated successfully.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index')->with('success', 'Product has been Deleted');
    }
}
