<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShippingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContacController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\AuthenticatorController;
use App\Http\Controllers\WhishlistController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\CouponController;
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
Route::get('/save-cart',[CartController::class,'SaveCart'] );
Route::get('/add-one-cart/{id}',[CartController::class,'AddOneCart'] );
Route::get('/delete-cart/{rowId}',[CartController::class,'DeleteCart'] );
Route::post('/update-cart',[CartController::class,'UpdateCart'] );
Route::get('/delete-cart/{rowId}',[CartController::class,'DeleteCart'] );
Route::get('/clear-all',[CartController::class,'clearCart'] );

//ajax
Route::post('/add-cart-ajax',[CartController::class,'add_cart_ajax'] );

//Payment
Route::get('/checkout',[PaymentController::class,'ShowCheckout'] );
Route::post('/payment',[PaymentController::class,'Payment'] );
Route::post('/save-checkout',[PaymentController::class,'saveCheckout']);
Route::post('/select-delivery-home',[PaymentController::class,'selectDeliveryHome']);
Route::post('/calculate-fee',[PaymentController::class,'calculateFee']);


//authenticator
Route::get('/show-login',[AuthenticatorController::class,'ShowLogin'] );
Route::get('/show-register',[AuthenticatorController::class,'ShowRegister'] );
Route::post('/register',[AuthenticatorController::class,'Register'] );
Route::post('/login',[AuthenticatorController::class,'Login'] );
Route::get('/logout',[AuthenticatorController::class,'Logout'] );
Route::get('/profile',[AuthenticatorController::class,'Profile'] );
Route::get('/edit-profile',[AuthenticatorController::class,'editProfile']);
Route::post('/update-profile',[AuthenticatorController::class,'updateProfile']);
Route::get('/change-password',[AuthenticatorController::class,'changePassword']);
Route::post('/save-change-password',[AuthenticatorController::class,'saveChangePassword']);

//reset-password
Route::get('/forget-password', [ResetPasswordController::class,'forgetPassword'] );
Route::post('/check-mail', [ResetPasswordController::class,'checkMail'] );
Route::get('/newpassword',[ResetPasswordController::class,'viewNewPassword']);
Route::post('/reset-password',[ResetPasswordController::class,'reset']);

//whishlist
Route::get('/whishlist',[WhishlistController::class,'ShowWhishlist'] );
Route::get('/add-whishlist/{id}',[WhishlistController::class,'AddWhishlist'] );
Route::get('/delete-whishlist/{id}',[WhishlistController::class,'DeleteWhishlist'] );

//admin
Route::get('/admin',[AdminController::class, 'index']);
Route::get('/adlogin',[AdminController::class, 'adLogin']);

//category
Route::get('/category',[CategoryController::class, 'index'])->name('category.index');
Route::get('/category.create',[CategoryController::class, 'create'])->name('category.create');
Route::get('/category.edit{id}',[CategoryController::class, 'edit'])->name('category.edit');
Route::get('/category.destroy{id}',[CategoryController::class, 'destroy'])->name('category.destroy');
Route::post('/category.store',[CategoryController::class, 'store'])->name('category.store');
Route::post('/category.update{id}',[CategoryController::class, 'update'])->name('category.update');


//blog
Route::get('/blogad',[BlogController::class, 'index'])->name('blog.index');
Route::get('/blog.create',[BlogController::class, 'create'])->name('blog.create');
Route::get('/blog.edit{id}',[BlogController::class, 'edit'])->name('blog.edit');
Route::post('/blog.destroy{id}',[BlogController::class, 'destroy'])->name('blog.destroy');
Route::post('/blog.store',[BlogController::class, 'store'])->name('blog.store');
Route::post('/blog.update{id}',[BlogController::class, 'update'])->name('blog.update');
//product
Route::get('/productad',[ProductController::class, 'index'])->name('product.index');
Route::get('/product.create',[ProductController::class, 'create'])->name('product.create');
Route::get('/product.edit{id}',[ProductController::class, 'edit'])->name('product.edit');
Route::post('/product.destroy{id}',[ProductController::class, 'destroy'])->name('product.destroy');
Route::post('/product.store',[ProductController::class, 'store'])->name('product.store');
Route::post('/product.update{id}',[ProductController::class, 'update'])->name('product.update');
Route::get('/shop/filter-by-category/{category}',[ProductController::class, 'filterByCategory']);
//order
Route::get('/order-index', [OrderController::class, 'index'])->name('order_index');
Route::get('/order-details{id}', [OrderController::class, 'showOrderDetails'])->name('order_details');
Route::get('/edit-order{id}', [OrderController::class, 'edit'])->name('edit_order');
Route::put('/update-order{id}', [OrderController::class, 'updateOrder'])->name('update_order');
Route::get('/filter', [OrderController::class,'filterOrders'])->name('filter_orders');
//print oder pdf
Route::get('/print-order/{id}', [OrderController::class,'printOrder']);


//shipping
Route::get('/shipping', [ShippingController::class, 'shipping'])->name('admin.shipping');
Route::get('/shipping.edit{id}', [ShippingController::class, 'shipping_edit'])->name('shipping_edit');
Route::post('/update-shipping{id}', [ShippingController::class, 'updateShipping'])->name('updateShipping');
Route::delete('/shipping.delete{id}', [ShippingController::class, 'deleteShipping'])->name('deleteShipping');

//user
Route::get('/accounts', [UserController::class, 'accounts'])->name('admin.accounts');
Route::get('/edit-account{id}', [UserController::class, 'editAccount'])->name('admin.editAccount');
Route::post('/update-account{id}', [UserController::class, 'updateAccount'])->name('admin.updateAccount');
Route::get('/account/{id}', [UserController::class, 'deleteAccount'])->name('admin.deleteAccount');
Route::get('/account{id}/confirm-delete', [UserController::class, 'showDeleteConfirmation'])->name('admin.showDeleteConfirmation');
Route::post('/update-account-status/{id}',[UserController::class,'updateAccountStatus'])->name('updateAccountStatus');

//delivery
Route::get('/delivery', [DeliveryController::class, 'delivery'])->name('admin.delivery');
Route::post('/select-delivery', [DeliveryController::class, 'selectDelivery']);
Route::post('/insert-delivery', [DeliveryController::class, 'insertDelivery']);
Route::post('/select-feeship', [DeliveryController::class, 'selectFeeship']);
Route::post('/update-delivery', [DeliveryController::class, 'updateDelivery']);
Route::post('/delete-delivery', [DeliveryController::class, 'deleteDelivery']);

//Coupon
Route::post('/check-coupon', [CouponController::class,'check_coupon'] );
Route::get('/unset-coupon', [CouponController::class,'unset_coupon'] );
Route::get('/insert-coupon', [CouponController::class,'insert_coupon'] );
Route::get('/delete-coupon/{coupon_id}', [CouponController::class,'delete_coupon'] );
Route::get('/list-coupon', [CouponController::class,'list_coupon'] );
Route::post('/insert-coupon-code', [CouponController::class,'insert_coupon_code'] );


