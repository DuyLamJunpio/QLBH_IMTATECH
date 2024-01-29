<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Throwable;

class ProfileCtrl extends Controller{
    public function index()
    {
        // $userId = session('user_id');
        // $user = User::find($userId);

        return view("profile.index"); // ['user' => $user]
    }
    
    public function editPass()
    {
        // $userId = session('user_id');
        // $user = User::find($userId);

        return view("profile.editPass"); // ['user' => $user]
    }
}