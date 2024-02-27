<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\product_variants;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = DB::table('products')
            ->join('categories', 'products.cat_id', '=', 'categories.id')
            ->select('products.*', 'categories.name AS categories_name')
            ->get();
        return view("products.index", compact("product"))->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function show()
    {
        $product = DB::table('products')
            ->join('categories', 'products.cat_id', '=', 'categories.id')
            ->select('products.*', 'categories.name AS categories_name')
            ->get();
        return view("User.product.products", compact("product"))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function showDetail(string $id)
    {
        $product = DB::table('products')->join('categories', 'products.cat_id', '=', 'categories.id')
            ->where('products.id', $id)
            ->select('products.*', 'categories.name AS categories_name')
            ->first();
        $variants = product_variants::where('product_id', $id)->get();
        return view("User.product.detailprod", compact("product", "variants"));
    }

    public function getcolor(string $id, string $color)
    {
        $sizes = product_variants::where([
            ['product_id', $id],
            ['color', $color]
        ])->get();
        return compact("sizes");
    }

    /**
     * Show the form for creating a new resource.
     */


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $categories = DB::table("categories")->get();
        if ($request->isMethod('POST')) {
            $validate = $request->validate([
                'name' => 'required|max:100',
                'price' => 'required|integer',
                'cost' => 'required|integer',
            ]);
            $params = $request->except('_token');
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $filename = $image->store('public/images');
                $params['image'] = $filename;
            }
            $product = Product::create($params);
            if ($product->id) {
                return redirect()->route('products.index')->with('success', 'Add product successfully!');
            }
        }
        return view('products.create', compact('categories'));
    }

    /**
     * Display the specified resource.
     */


    /**
     * Update the specified resource in storage.
     */
    public function edit(Request $request, string $id)
    {
        $categories = DB::table("categories")->get();
        $product = Product::join('categories', 'products.cat_id', '=', 'categories.id')
            ->select('products.*', 'categories.name AS categories_name')
            ->find($id);
        if ($request->isMethod('POST')) {
            $validate = $request->validate([
                'name' => 'required|max:100',
                'price' => 'required|integer',
                'cost' => 'required|integer',
            ]);
            $params = $request->except('_token');
            if ($request->hasFile('image')) {
                $resultImg = Storage::delete($product->image);
                if ($resultImg) {
                    $image = $request->file('image');
                    $filename = $image->store('public/images');
                    $params['image'] = $filename;
                } else {
                    $params['image'] = $product->image;
                }
            }
            $result = $product->update($params);
            if ($result) {
                return redirect()->route('products.index')->with('success', 'Edit product successfully!');
            }
        }
        return view('products.edit', compact('product', 'categories'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        $deleteImg = Storage::delete($product->image);
        $product->delete();
        return redirect()->back()->with('success', 'Delete product successfully!');
    }
}
