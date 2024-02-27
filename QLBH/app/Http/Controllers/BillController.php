<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bill;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bills = DB::table('bills')
        ->join('users','bills.user_id', '=', 'users.id')
        ->select('bills.*','users.fullname AS user_name')
        ->get();    
        return view("bill.index", compact('bills'))->with('i', (request()->input('page', 1) - 1) * 5); 

    }
    
    public function detail(string $id)
    {
        $bills = Bill::find($id);
        // ->join('users','bills.user_id', '=', 'users.id')
        // ->select('bills.*','users.fullname AS user_name')
        // ->get();    

        $users = DB::table('users')
        ->where('id', $bills->user_id)
        ->first();
        
        $users = DB::table('users')
        ->where('id', $bills->user_id)
        ->first();

        $bill_detail = DB::table('bills')
        ->join('users', 'bills.user_id', '=', 'users.id')
        ->join('products', 'bills.list_id_product', '=', 'products.id')
        ->join('categories', 'products.cat_id', '=', 'categories.id')
        ->select('bills.*', 'users.*','products.name AS product_name','products.price AS product_price', 'categories.name AS category_name')
        ->where('bills.id', $id)
        ->get();
        return view("bill.detail", compact('bills', 'bill_detail','users'));

    }

    // public function show(Request $request, string $id)
    // {
    //     $users = User::find($id);
    //     if (!$users) {
    //         dd ($users);
    //     }
    //     return view("management.detail_user", compact("users"));
    // }

    // public function edit(Request $request, string $id)
    // {
    //     //
    // }
}