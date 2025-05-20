<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        if (!Auth::check()) {
            return response()->json(['message' => 'Unauthorized. Please login first.'], 401);
        }

        $request->validate([
            'product_id' => 'required|exists:products,id',
            'size' => 'required|string',
            'quantity' => 'required|integer|min:1',
        ]);

        $user = Auth::user();

        // Check if cart item already exists
        $cartItem = Cart::where('user_id', $user->id)
                        ->where('product_id', $request->product_id)
                        ->where('size', $request->size)
                        ->first();

        if ($cartItem) {
            // Update quantity
            $cartItem->quantity += $request->quantity;
            $cartItem->save();
        } else {
            // Create new cart item
            Cart::create([
                'user_id' => $user->id,
                'product_id' => $request->product_id,
                'size' => $request->size,
                'quantity' => $request->quantity,
            ]);
        }

        $cartCount = Cart::where('user_id', $user->id)->count();

        return response()->json([
            'message' => 'Item added to cart successfully.',
            'count' => $cartCount
        ]);
    }


    public function showCart()
    {
        $cartItems = \App\Models\Cart::with('product')
            ->where('user_id', Auth::id())
            ->get();

        return view('frontend.cart', compact('cartItems'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $cartItem = Cart::findOrFail($id);
        $cartItem->quantity = $request->quantity;
        $cartItem->save();

        return redirect()->back()->with('success', 'Cart updated successfully.');
    }

    public function remove($id)
    {
        $cartItem = Cart::findOrFail($id);
        $cartItem->delete();

        return redirect()->back()->with('success', 'Item removed from cart.');
    }


}
