<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{

    public function index(Request $request)
    {

        $user_id = Auth::user()->id;

        $records = Bill::where('user_id', $user_id)
        ->join('products', 'bills.list_id_product', '=', 'products.id')
        ->join('categories', 'products.cat_id', '=', 'categories.id')
        ->select('bills.id AS bill_id', 'products.id AS product_id', 'bills.*', 'products.*', 'categories.name AS categories_name')
        ->get();

        return view('User.profile.purchase', compact("records"));
    }

    public function showDetail(Request $request, string $id)
    {
        $product = Product::join('categories', 'products.cat_id', '=', 'categories.id')
            ->select('products.*', 'categories.name AS categories_name')
            ->find($id);
        return view("User.product.donhang", compact("product"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->isMethod('POST')) {
            $params = $request->except('_token');
            $bill = Bill::create($params);
            if ($bill->id) {
                return redirect()->route('User.products')->with('success', 'Buy product successfully!');
            }
        }
        dd($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $bill = Bill::find($id);
        $bill->delete();
        return redirect()->back()->with('success', 'Delete bill successfully!');
    }
}
