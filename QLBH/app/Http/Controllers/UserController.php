<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('role', 0)->paginate(5);
        return view("management.user", compact("users"))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function show(Request $request, string $id)
    {
        $users = User::find($id);
        if (!$users) {
            dd ($users);
        }
        return view("management.detail_user", compact("users"));
    }

    public function edit(Request $request, string $id)
    {
        //
    }
}
