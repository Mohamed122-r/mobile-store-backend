<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function getCart(Request $request)
    {
        $sessionId = $request->session()->getId();
        $cartItems = Cart::with('product')->where('session_id', $sessionId)->get();

        $total = 0;
        foreach ($cartItems as $item) {
            $total += $item->quantity * $item->product->price;
        }

        return response()->json([
            'success' => true,
            'data' => [
                'items' => $cartItems,
                'total' => $total
            ]
        ]);
    }

    public function addToCart(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $sessionId = $request->session()->getId();
        $product = Product::find($request->product_id);

        // التحقق من المخزون
        if ($product->stock < $request->quantity) {
            return response()->json([
                'success' => false,
                'message' => 'Not enough stock available'
            ], 400);
        }

        $cartItem = Cart::where('session_id', $sessionId)
            ->where('product_id', $request->product_id)
            ->first();

        if ($cartItem) {
            $cartItem->quantity += $request->quantity;
            $cartItem->save();
        } else {
            Cart::create([
                'session_id' => $sessionId,
                'product_id' => $request->product_id,
                'quantity' => $request->quantity
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Product added to cart'
        ]);
    }

    public function updateCart(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        $sessionId = $request->session()->getId();
        $cartItem = Cart::where('session_id', $sessionId)->where('id', $id)->first();

        if (!$cartItem) {
            return response()->json([
                'success' => false,
                'message' => 'Cart item not found'
            ], 404);
        }

        $cartItem->quantity = $request->quantity;
        $cartItem->save();

        return response()->json([
            'success' => true,
            'message' => 'Cart updated'
        ]);
    }

    public function removeFromCart(Request $request, $id)
    {
        $sessionId = $request->session()->getId();
        $cartItem = Cart::where('session_id', $sessionId)->where('id', $id)->first();

        if (!$cartItem) {
            return response()->json([
                'success' => false,
                'message' => 'Cart item not found'
            ], 404);
        }

        $cartItem->delete();

        return response()->json([
            'success' => true,
            'message' => 'Product removed from cart'
        ]);
    }
}
