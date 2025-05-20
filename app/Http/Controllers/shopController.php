<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class shopController extends Controller
{
    public function showShop(){
        $products = Product::all();
        return view('frontend.shop', compact('products'));
    }

    // public function show($id)
    // {
    //     $product = Product::findOrFail($id);
    //     return view('frontend.product_details', compact('product'));
    // }

    public function details($id)
{
    $product = Product::findOrFail($id);
    $images = json_decode($product->images, true);
      $sizes = [
        50 => 'S',
        100 => 'M',
        150 => 'L',
        200 => 'XL',
    ];
     $size_name = $sizes[$product->size] ?? 'Unknown';
        return view('frontend.product_details', compact('product', 'images', 'size_name'));
}

}
