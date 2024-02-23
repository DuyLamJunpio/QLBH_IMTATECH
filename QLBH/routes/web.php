<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StatisticController;

Route::get('trangchu',function () {return view('User.index');})->name('trangchu');
Route::match(['GET', 'POST'],'profile',[ProfileController::class, 'edit'])->name('profile');
Route::get('user_profile',function () {return view('User.file');})->name('user_profile');
Route::get('user_change_password',function () {return view('User.change_pw');})->name('change_password');
Route::match(['GET', 'POST'],'change_password',[ProfileController::class, 'change_pw'])->name('change_pw');

//Auth
Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');

    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');

    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});

Route::middleware('admin')->group(function () {
    //products
    Route::get('/', [ProductController::class, 'index'])->name('products.index');
    Route::match(['GET', 'POST'], '/add', [ProductController::class, 'store'])->name('products.add');
    Route::match(['GET', 'POST'], '/edit/{id}', [ProductController::class, 'edit'])->name('products.edit');
    Route::get('delete/{id}', [ProductController::class, 'destroy'])->name('products.delete');

    //categories
    Route::get('/categories', [CategoriesController::class, 'index'])->name('categories.index');
    Route::match(['GET', 'POST'], '/categories/add', [CategoriesController::class, 'store'])->name('categories.add');
    Route::match(['GET', 'POST'], '/categories/edit/{id}', [CategoriesController::class, 'edit'])->name('categories.edit');
    Route::get('/categorie.delete/{id}', [CategoriesController::class, 'destroy'])->name('categories.delete');

    //user management
    Route::get('/user_management', [UserController::class, 'index'])->name('user_management.index');
    Route::get('/user_management/detail/{id}', [UserController::class, 'show'])->name('user_management.detail');

    // profile
    Route::get('/profile', function() {return view('profile.index');})->name('profile.index');
    Route::match(['GET', 'POST'], '/profile/edit', [ProfileController::class, 'edit_admin'])->name('profile.edit_admin');
    Route::match(['GET', 'POST'], '/profile/edit_pass', [ProfileController::class, 'edit_pass'])->name('profile.edit_pass');

    
    // statistic
    Route::get('/statistic', [StatisticController::class, 'index'])->name('statistic.index');

});