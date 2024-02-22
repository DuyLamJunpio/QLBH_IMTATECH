<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StatisticController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

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

// <<<<<<< HEAD
// =======
// Route::get('trangchu',function () {
//     return view('User.index');
// })->name('trangchu');

// // Route::get('sanpham',function () {
// //     return view('user.products');
// // })->name('sanpham');

// Route::get('sanpham', [ProductController::class, 'show'])->name('User.products');
// Route::get('detail/{id}', [ProductController::class, 'showDetail'])->name('User.detailprod');

// >>>>>>> 1230d6a1ba5fc1e11fd6a2e67a5fb6797cf95516
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
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    
    // profile
    Route::get('/statistic', [StatisticController::class, 'index'])->name('statistic.index');

});