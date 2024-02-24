<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{

    public function remove($index)
    {
        $cart = session()->get('cart', []);
    
        if (isset($cart[$index])) {
            unset($cart[$index]);
            session()->put('cart', $cart);
            return response()->json(['success' => 'Sản phẩm đã được xóa khỏi giỏ hàng.']);
        } else {
            return response()->json(['error' => 'Sản phẩm không tồn tại trong giỏ hàng.']);
        }
    }
    
    


    public function showCart(Request $request) {
        $cart = Session::get('cart', []);    
        return view('User.cart_shop', compact('cart'));
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
