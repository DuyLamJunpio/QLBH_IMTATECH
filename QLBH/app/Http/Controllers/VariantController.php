<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\product_variants;
use App\Models\Product;

class VariantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function add(Request $request, string $id)
    {
        $product = Product::find($id);
        $variants = product_variants::where('product_id', $id)->get();
        if ($request->isMethod('POST')) {
            $validate = $request->validate([
                'color' => 'required|string',
                'size' => 'required',
                'stock_quantity' => 'required|integer',
            ]);
            $params = $request->except('_token');
            $params['product_id'] = $id;
            $foundVariant = null;
            foreach ($variants as $variant) {
                if ($variant->color == $params['color'] && $variant->size == $params['size']) {
                    $foundVariant = $variant;
                    break;
                }
            }

            if ($foundVariant) {
                // Nếu tìm thấy variant có cùng color và size, cập nhật quantity
                $foundVariant->stock_quantity += $params['stock_quantity'];
                $foundVariant->save();
                return redirect()->route('products.variant', ['id' => $id])->with('success', 'Update quantity product variant successfully');
            } else {
                // Nếu không tìm thấy, tạo mới variant
                $variant = product_variants::create($params);
                if ($variant->id) {
                    return redirect()->route('products.variant', ['id' => $id])->with('success', 'Add product variant successfully');
                }
            }
        }
        return view('products.variant', compact('variants','product'))->with('i');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, string $id , string $idProduct)
    {
        $variants_With_IdProduct = product_variants::where('product_id', $idProduct)->get();
        $variant = product_variants::find($id);
        if ($request->isMethod('POST')) {
            $validate = $request->validate([
                'color' => 'required|string',
                'size' => 'required',
                'stock_quantity' => 'required|integer',
            ]);
            $params = $request->except('_token');
            $params['product_id'] = $idProduct;
            $result = $variant->update($params);
            if ($result) {
                return redirect()->route('products.variant', ['id' => $idProduct])->with('success', 'Edit product variant successfully!');
            }
        }
        return view('products.variant_edit', compact('variant', 'variants_With_IdProduct'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $variant = product_variants::find($id);
        $variant->delete();
        return redirect()->back()->with('success', 'Delete product variant successfully!');
    }
}
