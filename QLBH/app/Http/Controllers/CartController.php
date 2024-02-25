<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{

    public function updateQuantityInSession(Request $request)
    {
        $quantity = $request->input('quantity');
        Session::put('cart_quantity', $quantity);
        return response()->json(['message' => 'Số lượng đã được cập nhật trong session.']);
    }
    public function removeFromCart($id)
    {
        $cart = session()->get('cart', []);
    
        if(isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
    
        return redirect()->route('cart');
    }
    
    public function showCart()
    {
        $cart = session()->get('cart', []);

        return view('User.profile.cart', compact('cart'));
    }


    public function add(Request $request)
    {
        $product = Product::find($request->id);

        $cart = Session::get('cart', []);

        if (isset($cart[$request->id])) {
            $cart[$request->id]['quantity']++;
        } else {
            $cart[$request->id] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
                'image' => $product->image,
            ];
        }

        Session::put('cart', $cart);

        return redirect()->route('cart')->with('success', 'Product added to the cart successfully!');
    }
}
