<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\GiftController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

/*Trang Login, Logout*/

Route::prefix('auth')->name('auth.')->group(function () {
    Route::get('login', [AuthController::class, 'viewlogin'])->name('viewlogin');
    Route::post('login', [AuthController::class, 'login'])->name('login');

    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});


//Trang Feedback
Route::get('admin/feedback/index', [FeedbackController::class, 'index']);
Route::post('admin/feedback/store', [FeedbackController::class, 'store']);

//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~

//Phần của Admin về bài viết!! CATEGORY ONLY!!!!!

// Trang admin xem bài viết
Route::get('admin/category/index', [CategoryController::class, 'index'])->name('admin.category.index');

// Trang admin thêm bài viết
Route::get('admin/category/create', [CategoryController::class, 'create'])->name('admin.category.create');

// Trang admin lưu trữ dữ liệu vào database
Route::post('admin/category/store', [CategoryController::class, 'store'])->name('admin.category.store');

// Trang hiện form sửa (GET), lưu dữ liệu thể loại vào database (POST)
Route::get('admin/category/edit/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');
Route::post('admin/category/update/{id}', [CategoryController::class, 'update'])->name('admin.category.update');

//Trang admin xóa bài viết
Route::get('admin/category/destroy/{id}', [CategoryController::class, 'destroy'])->name('admin.category.destroy');

//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~



//Phần của Admin về thể loại!! Product ONLY!!!!!

// Trang admin xem thể loại!
Route::get('admin/product/index', [ProductController::class, 'index'])->name('admin.product.index');

// Hiện form tạo thể loại!
Route::get('admin/product/create', [ProductController::class, 'create'])->name('admin.product.create');

// Trang lưu dữ liệu , thêm thể loại vào database
Route::post('admin/product/store', [ProductController::class, 'store'])->name('admin.product.store');

// Trang hiện form sửa danh mục(GET) . lưu dữ liệu sửa thể loại vào database! (POST)
Route::get('admin/product/edit/{id}', [ProductController::class, 'edit'])->name('admin.product.edit');
Route::post('admin/product/update/{id}', [ProductController::class, 'update'])->name('admin.product.udpate');

//Xóa thể loại
Route::get('admin/product/destroy/{id}', [ProductController::class, 'destroy'])->name('admin.product.destroy');

//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~



//Phần của Admin về quản lý user!! USER ONLY!!!!!

//Trang admin xem tài khoản hiện có trên database!
Route::get('admin/account/index', [AccountController::class, 'index'])->name('admin.account.index');

// Hiện form tạo tài khoản!
Route::get('admin/account/create', [AccountController::class, 'create'])->name('admin.account.create');

// Trang lưu dữ liệu , thêm tài khoản vào database
Route::post('admin/account/store', [AccountController::class, 'store'])->name('admin.account.store');

// Trang hiện form sửa tài khoản (GET) . lưu dữ liệu tài khoản vào database! (POST)
Route::get('admin/account/edit/{id}', [AccountController::class, 'edit'])->name('admin.account.edit');
Route::post('admin/account/update/{id}', [AccountController::class, 'update'])->name('admin.account.udpate');

//Xóa tài khoản
Route::get('admin/account/destroy/{id}', [AccountController::class, 'destroy'])->name('admin.account.destroy');


//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~



//Phần của Admin về quản lý quà!! GIFT ONLY!!!!!

// Trang admin xem quà!
Route::get('admin/gift/index', [GiftController::class, 'index'])->name('admin.gift.index');

// Hiện form tạo quà!
Route::get('admin/gift/create', [GiftController::class, 'create'])->name('admin.gift.create');

// Trang lưu dữ liệu , thêm quà! vào database
Route::post('admin/gift/store', [GiftController::class, 'store'])->name('admin.gift.store');

// Trang hiện form sửa quà!(GET) . lưu dữ liệu quà vào database! (POST)
Route::get('admin/gift/edit/{id}', [GiftController::class, 'edit'])->name('admin.gift.edit');
Route::post('admin/gift/update/{id}', [GiftController::class, 'update'])->name('admin.gift.udpate');

//Xóa quà!
Route::get('admin/gift/destroy/{id}', [GiftController::class, 'destroy'])->name('admin.gift.destroy');
