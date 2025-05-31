<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shipping;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class ShippingController extends Controller
{
   public function store(Request $request)
    {

        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'country' => 'required|string',
            'email' => 'required|email',
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
            'city' => 'required|string',
            'zip_code' => 'required|string',
            'state' => 'required|string',
            'delivery_instruction' => 'nullable|string',
        ]);

        Shipping::create($validated);

        return redirect()->back()->with('success', 'Shipping details saved successfully.');
    }

public function index()
{
    $userId = Auth::id(); 
    $shipping = Shipping::where('user_id', $userId)->latest()->first(); 
    $cartItems = Cart::with('product')
            ->where('user_id', $userId)
            ->get();

    return view('frontend.shipping', compact('shipping', 'cartItems'));
} 

}
