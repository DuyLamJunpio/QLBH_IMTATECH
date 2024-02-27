<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cart;
use App\Models\product_variants;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $idProduct)
    {
        if ($request->isMethod('POST')) {
            $params = $request->except('_token');
            $color = $request->color;
            $size = $request->size;
            $variant = product_variants::where([
                ['color', $color],
                ['size', $size]
            ])->first();
            $params['idVariant'] = $variant->id;
            $params['idUser'] = Auth::user()->id;
            $params['idProduct'] = $idProduct;
            $cart = cart::create($params);
            if ($cart->id) {
                return redirect()->route('User.detailprod', ['id' => $idProduct])->with('success', 'Add cart successfully!');
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $carts = DB::table('carts')
        ->join('product_variants', 'carts.idVariant', '=', 'product_variants.id')
        ->join('products', 'carts.idProduct', '=', 'products.id')
        ->where('carts.idUser', Auth::user()->id)
        ->select(
            'carts.*',
            'carts.id AS cart_id',
            'product_variants.*',
            'product_variants.id AS product_variant_id',
            'products.*',
            'products.id AS id_Prod'
        )
        ->get();

        return view("User.product.cart", compact("carts"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }


    public function destroy(string $id)
    {
        $cart = cart::find($id);
        $cart->delete();
        return redirect()->back()->with('success', 'Delete cart item successfully!');
    }
}
