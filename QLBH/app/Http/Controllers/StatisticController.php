<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Bill;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Throwable;

class StatisticController extends Controller{
    public function index()
    {
        $billCount = Bill::count();
        $totalPayment = Bill::sum('total_payment');
        $totalQuantity = Bill::sum('quantity');

        
        $products = Product::all();
        $totalInventory = $products->sum('inventory');
        $totalCost = $products->sum('cost');
        return view("statistic.index", compact('totalInventory', 'totalCost', 'billCount','totalPayment','totalQuantity')); 
    }
    
    // public function editPass()
    // {
    //     // $userId = session('user_id');
    //     // $user = User::find($userId);

    //     return view("profile.editPass"); // ['user' => $user]
    // }
}