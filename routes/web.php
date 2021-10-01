<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ForgetPasswordController;

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

Route::get('/',[HomeController::class,'index'])->name('home');


//register
Route::get('/register',[RegisterController::class,'index'])->name('register.index');
Route::post('/register',[RegisterController::class,'store'])->name('register');
//email verification
Route::get('/email/verify/{id}/{hash}',[RegisterController::class,'verifyEmail'])->name('verification.verify');
//resend verification email
Route::post('/email/verification-notification',[RegisterController::class,'sendVerifyEmail'] )->name('verification.send');

//login logout
Route::get('/login', [LoginController::class,'index'])->name('login.index');
Route::post('/login',[LoginController::class,'login'])->name('login');
Route::get('/logout',[LoginController::class,'logOut'])->name('logout');

//forget password form
Route::get('/forgetPassword',[ForgetPasswordController::class,'index'] )->name('forgetPassword.index');
//send reset password email
Route::post('/forgetPassword',[ForgetPasswordController::class,'sendResetPassEmail'])->name('forgetPassword.email');
//reset password form
Route::get('/reset-password/{token}',[ForgetPasswordController::class,'showResetPassForm'])->name('password.reset');
//reset password
Route::post('/reset-password',[ForgetPasswordController::class,'resetPass'])->name('password.update');


//shopping cart
Route::get('/cart', [CartController::class,'index'])->name('cart.index');
//add items to cart
Route::get('/cart/add', [CartController::class,'store'])->name('cart.add');
//add notes to cart
Route::post('/cart/addNotes',[CartController::class,'addNotes'])->name('cart.addNotes');
//remove notes from cart
Route::post('/cart/removeNotes',[CartController::class,'removeNotes'])->name('cart.removeNotes');
//remove items from cart
Route::get('/cart/{id}/remove', [CartController::class,'destroy'])->name('cart.remove');
//remove all items in cart
Route::get('/cart/removeAll', function(){
    Session::forget('cart');
    return back();
})->name('cart.removeAll');

//orders
Route::get('/order', [OrderController::class,'index'])->name('order.index');

//payment
Route::post('/payment',[PaymentController::class,'attemp_payment'])->name('payment.attemp_payment');

//payment result
Route::get('/payment-result',[PaymentController::class,'payment_result'])->name('payment.payment_result');

//dashboard 
Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard.index');
//edit user details
Route::get('/dashboard/user/update', [DashboardController::class,'updateUserDetailsIndex'])->name('dashboard.user.update.index');
Route::post('/dashboard/user/update', [DashboardController::class,'updateUserDetails'])->name('dashboard.user.update');

//order history
Route::get('/dashboard/orders-history',[DashboardController::class,'displayOrderHistory'])->name('dashboard.order-history.index');
//order past orders
Route::post('/dashboard/orders-history/order',[DashboardController::class,'orderPastOrders'])->name('dashboard.orders.store');

//admin/user
Route::get('/admin', [AdminController::class,'index'])->name('admin.index');
Route::get('/admin/add-user',[AdminController::class,'createUserIndex'])->name('admin.user.create');
Route::post('/admin/delete-user',[AdminController::class,'deleteUser'])->name('admin.user.delete');
Route::get('/admin/update-user/{user:id}',[AdminController::class,'updateUserIndex'])->name('admin.user.update.index');
Route::post('/admin/update-user',[AdminController::class,'updateUser'])->name('admin.user.update');
//admin/menu
Route::get('/admin/menu-items',[AdminController::class,'menuItemsIndex'])->name('admin.menu-items.index');

Route::get('/admin/menu-items/create',[AdminController::class,'createMenuItemsIndex'])->name('admin.menu-items.store.index');
Route::post('/admin/menu-items/create',[AdminController::class,'createMenuItems'])->name('admin.menu-items.store');

Route::post('/admin/menu-items/delete',[AdminController::class,'deleteMenuItems'])->name('admin.menu-items.delete');
Route::post('/admin/menu-items/updateImage',[AdminController::class,'updateMenuItemsImage'])->name('admin.menu-items.image.update');
Route::get('/admin/menu-items/updateDetails/{item_name}',[AdminController::class,'updateMenuItemsDetailsIndex'])->name('admin.menu-items.update.index');
Route::post('/admin/menu-items/updateDetails',[AdminController::class,'updateMenuItemsDetails'])->name('admin.menu-items.update');

