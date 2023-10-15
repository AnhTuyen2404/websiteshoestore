<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContacController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\AuthenticatorController;
use App\Http\Controllers\WhishlistController;


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

//Home
Route::get('/',[HomeController::class,'GetHome'] )->name('home');

//Shop
Route::get('/shop',[ShopController::class,'GetAllProduct'] );
Route::get('/category/{id}',[ShopController::class,'GetProduct_Category'] );
Route::get('/product-details/{id}',[ShopController::class,'ProductDetails'] );


//Blog
Route::get('/blog',[BlogController::class,'GetAllBlog'] );
Route::get('/blog-details/{id}',[BlogController::class,'GetBlogDetails'] );

//Cart
Route::get('/show-cart',[CartController::class,'ShowCart'] );
Route::post('/save-cart',[CartController::class,'SaveCart'] );
Route::get('/add-one-cart/{id}',[CartController::class,'AddOneCart'] );
Route::get('/delete-cart/{rowId}',[CartController::class,'DeleteCart'] );
Route::post('/update-cart',[CartController::class,'UpdateCart'] );

//Payment
Route::get('/checkout',[PaymentController::class,'ShowCheckout'] );
Route::post('/payment',[PaymentController::class,'Payment'] );

//authenticator
Route::get('/show-login',[AuthenticatorController::class,'ShowLogin'] );
Route::get('/show-register',[AuthenticatorController::class,'ShowRegister'] );
Route::post('/register',[AuthenticatorController::class,'Register'] );
Route::post('/login',[AuthenticatorController::class,'Login'] );
Route::get('/logout',[AuthenticatorController::class,'Logout'] );

//whishlist
Route::get('/whishlist',[WhishlistController::class,'ShowWhishlist'] );
Route::get('/add-whishlist/{id}',[WhishlistController::class,'AddWhishlist'] );
Route::get('/delete-whishlist/{id}',[WhishlistController::class,'DeleteWhishlist'] );

//admin
Route::get('/admin',[\App\Http\Controllers\AdminController::class, 'index']);
//category
Route::get('/category',[\App\Http\Controllers\CategoryController::class, 'index'])->name('category.index');
Route::get('/category.create',[\App\Http\Controllers\CategoryController::class, 'create'])->name('category.create');
Route::get('/category.edit{id}',[\App\Http\Controllers\CategoryController::class, 'edit'])->name('category.edit');
Route::get('/category.destroy{id}',[\App\Http\Controllers\CategoryController::class, 'destroy'])->name('category.destroy');
Route::post('/category.store',[\App\Http\Controllers\CategoryController::class, 'store'])->name('category.store');
Route::post('/category.update{id}',[\App\Http\Controllers\CategoryController::class, 'update'])->name('category.update');
//blog
Route::get('/blogad',[\App\Http\Controllers\BlogController::class, 'index'])->name('blog.index');
Route::get('/blog.create',[\App\Http\Controllers\BlogController::class, 'create'])->name('blog.create');
Route::get('/blog.edit{id}',[\App\Http\Controllers\BlogController::class, 'edit'])->name('blog.edit');
Route::post('/blog.destroy{id}',[\App\Http\Controllers\BlogController::class, 'destroy'])->name('blog.destroy');
Route::post('/blog.store',[\App\Http\Controllers\BlogController::class, 'store'])->name('blog.store');
Route::post('/blog.update{id}',[\App\Http\Controllers\BlogController::class, 'update'])->name('blog.update');
//product
Route::get('/productad',[\App\Http\Controllers\ProductController::class, 'index'])->name('product.index');
Route::get('/product.create',[\App\Http\Controllers\ProductController::class, 'create'])->name('product.create');
Route::get('/product.edit{id}',[\App\Http\Controllers\ProductController::class, 'edit'])->name('product.edit');
Route::post('/product.destroy{id}',[\App\Http\Controllers\ProductController::class, 'destroy'])->name('product.destroy');
Route::post('/product.store',[\App\Http\Controllers\ProductController::class, 'store'])->name('product.store');
Route::post('/product.update{id}',[\App\Http\Controllers\ProductController::class, 'update'])->name('product.update');
//order
Route::get('/order-index', [\App\Http\Controllers\OrderController::class, 'index'])->name('order_index');
Route::get('/order-details{id}', [\App\Http\Controllers\OrderController::class, 'showOrderDetails'])->name('order_details');
Route::get('/edit-order{id}', [\App\Http\Controllers\OrderController::class, 'edit'])->name('edit_order');
Route::put('/update-order{id}', [\App\Http\Controllers\OrderController::class, 'updateOrder'])->name('update_order');
//shipping
Route::get('/shipping', [\App\Http\Controllers\ShippingController::class, 'shipping'])->name('admin.shipping');
Route::get('/shipping.edit{id}', [\App\Http\Controllers\ShippingController::class, 'shipping_edit'])->name('shipping_edit');
Route::post('/update-shipping{id}', [\App\Http\Controllers\ShippingController::class, 'updateShipping'])->name('updateShipping');
Route::delete('/shipping.delete{id}', [\App\Http\Controllers\ShippingController::class, 'deleteShipping'])->name('deleteShipping');
//user
Route::get('/accounts', [\App\Http\Controllers\UserController::class, 'accounts'])->name('admin.accounts');
Route::get('/edit-account{id}', [\App\Http\Controllers\UserController::class, 'editAccount'])->name('admin.editAccount');
Route::post('/update-account{id}', [\App\Http\Controllers\UserController::class, 'updateAccount'])->name('admin.updateAccount');
Route::delete('/account{id}', [\App\Http\Controllers\UserController::class, 'deleteAccount'])->name('admin.deleteAccount');
Route::get('/account{id}/confirm-delete', [\App\Http\Controllers\UserController::class, 'showDeleteConfirmation'])->name('admin.showDeleteConfirmation');

