<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//index
Route::get('index',[\App\Http\Controllers\HomeController::class,'index']);
Route::get('shop',[\App\Http\Controllers\HomeController::class,'shop']);
Route::post('search',[\App\Http\Controllers\HomeController::class,'search']);

//404
Route::view('order','order');
//cart
Route::get('show-cart',[\App\Http\Controllers\CartController::class,'show_cart']);
Route::get('delete-cart/{id}',[\App\Http\Controllers\CartController::class,'delete_cart']);
Route::post('save-cart',[\App\Http\Controllers\CartController::class,'save_cart']);
Route::post('update-cart-qty',[\App\Http\Controllers\CartController::class,'update_cart_qty']);

//Checkout
Route::get('login',[\App\Http\Controllers\CheckoutController::class,'login_checkout']);
Route::get('logout-user',[\App\Http\Controllers\CheckoutController::class,'logout_user']);
Route::post('login-user',[\App\Http\Controllers\CheckoutController::class,'login_user']);
Route::get('checkout',[\App\Http\Controllers\CheckoutController::class,'checkout']);
Route::get('payment',[\App\Http\Controllers\CheckoutController::class,'payment']);
Route::post('add-customer',[\App\Http\Controllers\CheckoutController::class,'add_customer']);
Route::post('save-checkout',[\App\Http\Controllers\CheckoutController::class,'save_checkout']);
Route::post('order-place',[\App\Http\Controllers\CheckoutController::class,'order_place']);


//Admin
Route::view('login-admin','admin.login');
Route::get('dashboard',[\App\Http\Controllers\AdminController::class,'dashboard']);
Route::get('logout',[\App\Http\Controllers\AdminController::class,'logout']);
Route::post('admin-dashboard',[\App\Http\Controllers\AdminController::class,'admin_dashboard']);


//Category Product
Route::get('add-category-product',[\App\Http\Controllers\CategoryProductController::class,'add_category_product']);
Route::get('list-category-product',[\App\Http\Controllers\CategoryProductController::class,'list_category_product']);

Route::get('edit-category-product/{id}',[\App\Http\Controllers\CategoryProductController::class,'edit_category_product']);
Route::get('delete-category-product/{id}',[\App\Http\Controllers\CategoryProductController::class,'delete_category_product']);

Route::get('active-category-product/{id}',[\App\Http\Controllers\CategoryProductController::class,'active_category_product']);
Route::get('unactive-category-product/{id}',[\App\Http\Controllers\CategoryProductController::class,'unactive_category_product']);

Route::post('save-category-product',[\App\Http\Controllers\CategoryProductController::class,'save_category_product']);
Route::post('update-category-product/{id}',[\App\Http\Controllers\CategoryProductController::class,'update_category_product']);

//Brand product
Route::get('add-brand-product',[\App\Http\Controllers\BrandProductController::class,'add_brand_product']);
Route::get('list-brand-product',[\App\Http\Controllers\BrandProductController::class,'list_brand_product']);

Route::get('edit-brand-product/{id}',[\App\Http\Controllers\BrandProductController::class,'edit_brand_product']);
Route::get('delete-brand-product/{id}',[\App\Http\Controllers\BrandProductController::class,'delete_brand_product']);

Route::get('active-brand-product/{id}',[\App\Http\Controllers\BrandProductController::class,'active_brand_product']);
Route::get('unactive-brand-product/{id}',[\App\Http\Controllers\BrandProductController::class,'unactive_brand_product']);

Route::post('save-brand-product',[\App\Http\Controllers\BrandProductController::class,'save_brand_product']);
Route::post('update-brand-product/{id}',[\App\Http\Controllers\BrandProductController::class,'update_brand_product']);

//Product
Route::get('add-product',[\App\Http\Controllers\ProductController::class,'add_product']);
Route::get('list-product',[\App\Http\Controllers\ProductController::class,'list_product']);

Route::get('edit-product/{id}',[\App\Http\Controllers\ProductController::class,'edit_product']);
Route::get('delete-product/{id}',[\App\Http\Controllers\ProductController::class,'delete_product']);

Route::get('active-product/{id}',[\App\Http\Controllers\ProductController::class,'active_product']);
Route::get('unactive-product/{id}',[\App\Http\Controllers\ProductController::class,'unactive_product']);

Route::post('save-product',[\App\Http\Controllers\ProductController::class,'save_product']);
Route::post('update-product/{id}',[\App\Http\Controllers\ProductController::class,'update_product']);



//***USER***//

//Category
Route::get('danh-muc/{id}',[\App\Http\Controllers\CategoryProductController::class,'show_category']);
//Brand
Route::get('thuong-hieu/{id}',[\App\Http\Controllers\BrandProductController::class,'show_brand']);
//Product
Route::get('single-product/{id}',[\App\Http\Controllers\ProductController::class,'single_product']);
