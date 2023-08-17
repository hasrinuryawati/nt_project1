<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::orderByDesc('id')->get();
        return view('module.admin.product', compact('product'));
    }

    public function userPoduct()
    {
        $product = Product::orderByDesc('id')->where('stock', '>', 0)->get();
        return view('module.user.product', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product              = new Product;
        $product->name        = $request->name;
        $product->price       = filter_var($request->price, FILTER_SANITIZE_NUMBER_INT);
        $product->stock       = filter_var($request->stock, FILTER_SANITIZE_NUMBER_INT);
        $product->description = $request->description;
        $product->save();
        
        return redirect()->back()->with('message','Berhasil menambah data');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $product_data              = Product::find($product->id) ;
        $product_data->name        = $request->name;
        $product_data->price       = filter_var($request->price, FILTER_SANITIZE_NUMBER_INT);
        $product_data->stock       = filter_var($request->stock, FILTER_SANITIZE_NUMBER_INT);
        $product_data->description = $request->description;
        $product_data->save();

        return redirect()->back()->with('message','Data berhasil di ubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->back()->with('message','Data berhasil di hapus');
    }
}
