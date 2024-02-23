<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Throwable;

class StatisticController extends Controller{
    public function index()
    {
        $products = Product::all();
        $totalInventory = $products->sum('inventory');
        $totalCost = $products->sum('cost');
        return view("statistic.index", compact('totalInventory', 'totalCost')); 
    }
    
    // public function editPass()
    // {
    //     // $userId = session('user_id');
    //     // $user = User::find($userId);

    //     return view("profile.editPass"); // ['user' => $user]
    // }
}