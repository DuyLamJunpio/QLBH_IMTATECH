<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{

    public function edit(Request $request)
    {
        $id = Auth::user()->id;
        $profile = User::find($id);
        if ($request->isMethod('POST')) {
            $validate = $request->validate([
                'fullname' => 'required|max:30',
                'email' => 'required|email',
                'phone' => 'required|digits:10',
                'address' => 'required',
            ]);
            $params = $request->except('_token');
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $filename = $image->store('public/images');
                $params['image'] = $filename;
            }
            $result = $profile->update($params);
            if ($result) {
                return redirect()->route('profile')->with('success', 'Edit profile successfully!');
            }
        }
        return view('User.file');
    }

    public function change_pw(Request $request)
    {
        $id = Auth::user()->id;
        $user = User::find($id);

        if ($request->isMethod('POST')) {
            $oldPassword = $request->input('oldpassword');
            if (Hash::check($oldPassword, $user->password)) {
                $validate = $request->validate([
                    'password' => 'required|confirmed',
                ]);

                // Lấy các tham số cần thiết
                $params = $request->only('password');

                // Cập nhật mật khẩu
                $result = $user->update([
                    'password' => Hash::make($params['password']),
                ]);

                // Kiểm tra kết quả cập nhật
                if ($result) {
                    return redirect()->route('user_profile', ['id' => $id])->with('success', 'Update successfully!');
                } else {
                    return back()->withInput()->withErrors(['password' => 'Failed to update password']);
                }
            }else{
                Session::flash('error', 'Sai mật khẩu. Vui lòng thử lại.');
                return redirect()->route('change_pw');
            }
        }
        return view('User.change_pw');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
=======
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Throwable;

class ProfileController extends Controller{
    public function index()
    {
        // $userId = session('user_id');
        // $user = User::find($userId);

        return view("profile.profile"); // ['user' => $user]
    }
    
    public function editPass()
    {
        // $userId = session('user_id');
        // $user = User::find($userId);

        return view("profile.editPass"); // ['user' => $user]
    }
}
>>>>>>> 1230d6a1ba5fc1e11fd6a2e67a5fb6797cf95516
