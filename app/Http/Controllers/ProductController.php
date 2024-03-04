<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $products = Product::latest()->paginate(5);
    return view('products.index', compact('products'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $rules = [
      'name' => 'required|unique:products',
      'price' => 'required',
    ];

    $messages = [
      'name.required' => 'Product name is required',
      'name.unique' => 'Product Already Exist',
      'price.required' => 'Product price is required'
    ];

    $request->validate($rules, $messages);

    $product = new Product();
    $product->name = $request->name;
    $product->price = $request->price;
    $product->save();

    return response()->json([
      'status' => 'success',
    ]);
  }

  /**
   * Display the specified resource.
   */
  public function show(Product $product)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Product $product)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Product $product)
  {
    $rules = [
      'up_name' => 'required|unique:products,name,' . $product->up_id,
      'up_price' => 'required',
    ];

    $messages = [
      'up_name.required' => 'Product name is required',
      'up_name.unique' => 'Product Already Exist',
      'up_price.required' => 'Product price is required'
    ];

    $request->validate($rules, $messages);

    Product::where('id', $product->id)->update([
      'name' => $request->up_name,
      'price' => $request->up_price,
    ]);

    return response()->json([
      'status' => 'success',
    ]);
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Product $product)
  {
    Product::destroy($product->id);

    return response()->json([
      'status' => 'success',
    ]);
  }
}
