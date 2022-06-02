<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\MyOrderController;
use App\Http\Controllers\DirectBuyController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\MyCancellationController;
use App\Http\Controllers\Admin\CustomerQuestionController;

// Public routes
Route::group(['middleware' => ['web']], function () {

  Route::get('/', [ShopController::class, 'index'])->name('shop.index');
  Route::get('/shop/{id}-{slug}', [ShopController::class, 'show'])->name('shop.show');
  Route::get('/catalog', [ShopController::class, 'catalog'])->name('shop.catalog');
  Route::get('/catalog/{id}-{slug}', [ShopController::class, 'catalogCategory'])->name('shop.catalog.category');
  Route::permanentRedirect('/shop', '/'); //same routes 

});


//Redirecting users, admin to dashboard and users to their accounts
Route::get('/home', [HomeController::class, 'index'])->name('home.index');

//Account management
Route::group(['middleware' => ['web', 'auth']], function () {

  //logout for all role users
  Route::get('/logout', [AccountController::class, 'logout'])->name('account.logout');

  //changing the password
  Route::put('/account/changePassword', [AccountController::class, 'changePassword'])->name('account.changePassword');
});


// User routes
Route::group(['middleware' => ['auth', 'role:user|admin']], function () {

  //Admin
  Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
  Route::post('/admin/category/create', [CategoryController::class, 'create'])->name('admin.category.create');
  Route::post('/admin/category/store', [CategoryController::class, 'store'])->name('admin.category.store');
  Route::post('/admin/category/{id}/edit', [CategoryController::class, 'edit'])->name('admin.category.edit');
  Route::post('/admin/category/update', [CategoryController::class, 'update'])->name('admin.category.update');
  Route::get('/admin/category/{id}/destroy', [CategoryController::class, 'destroy'])->name('admin.category.destroy');

  Route::get('/product', [ProductController::class, 'index'])->name('admin.product.index');
  Route::post('/product/store', [ProductController::class, 'store'])->name('admin.product.store');
  Route::get('/product/create', [ProductController::class, 'create'])->name('admin.product.create');
  Route::get('/admin/product/{id}/edit', [ProductController::class, 'edit'])->name('admin.product.edit');
  Route::post('/product/update', [ProductController::class, 'update'])->name('admin.product.update');
  Route::get('/product/{id}/destroy', [ProductController::class, 'destroy'])->name('admin.product.destroy');

  // flash-sale products directly added to order
  Route::post('/direct-buy', [DirectBuyController::class, 'order'])->name('directBuy.order');

  // user wishlist
  Route::get('/wishlist', [CartController::class, 'wishlist'])->name('cart.wishlist');
  Route::get('/wishlist/add', [CartController::class, 'wishlistAdd'])->name('cart.wishlist.add');
  Route::get('/wishlist/{id}/destroy', [CartController::class, 'wishlistDestroy'])->name('cart.wishlist.destroy');


  // user cart
  Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
  Route::post('/cart/store', [CartController::class, 'store'])->name('cart.store');
  Route::get('/cart/api/all', [CartController::class, 'all']);
  Route::post('/cart/destroy/selected', [CartController::class, 'destroySelected']);

  Route::get('/my-order', [MyOrderController::class, 'index'])->name('myOrder.index');
  Route::delete('/my-order/{id}', [MyOrderController::class, 'destroy'])->name('myOrder.destroy');

  Route::get('/my-cancellation', [MyCancellationController::class, 'index'])->name('myCancellation.index');
  Route::post('/my-cancellation', [MyCancellationController::class, 'store'])->name('myCancellation.store');

  Route::get('/user', [UserController::class, 'index'])->name('user.index');
  Route::post('/user/address', [UserController::class, 'address'])->name('user.address');

  //customer queries
  Route::get('/customer-question', [CustomerQuestionController::class, 'index'])->name('customerQuestion.index');
  Route::middleware('auth')->post('/customer-question', [CustomerQuestionController::class, 'store'])->name('customerQuestion.store');
  Route::middleware('auth')->delete('/customer-question/{id}', [CustomerQuestionController::class, 'destroy'])->name('customerQuestion.destroy');
});
