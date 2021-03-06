<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ForgetPasswordController;
use App\Http\Controllers\OnlineShopController;


Route::get('/', [PageController::class, 'showHomePage'])->name('home');

//register
Route::get('/register', [RegisterController::class, 'index'])->name('register.index');
Route::post('/register', [RegisterController::class, 'store'])->name('register');
//email verification
Route::get('/email/verify/{id}/{hash}', [RegisterController::class, 'verifyEmail'])->name('verification.verify');
//resend verification email
Route::post('/email/verification-notification', [RegisterController::class, 'sendVerifyEmail'])->name('verification.send');
//verify sms verification
Route::post('/phone/verification-notification/verify', [RegisterController::class, 'VerifySMS'])->name('SmsVerification.verify');
//resend sms verification
Route::post('/phone/verification-notification/resend', [RegisterController::class, 'reSendVerifySMS'])->name('SmsVerification.send');


//login logout
Route::get('/login', [LoginController::class, 'index'])->name('login.index');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logOut'])->name('logout');

//forget password form
Route::get('/forgetPassword', [ForgetPasswordController::class, 'index'])->name('forgetPassword.index');
//send reset password email
Route::post('/forgetPassword', [ForgetPasswordController::class, 'sendResetPass'])->name('forgetPassword.send');
//reset password form
Route::get('/reset-password/{token}', [ForgetPasswordController::class, 'showResetPassForm'])->name('password.reset');
//reset password
Route::post('/reset-password', [ForgetPasswordController::class, 'resetPass'])->name('password.update');


//add items to cart
Route::get('/cart/add', [CartController::class, 'store'])->name('cart.add');
//add notes to cart
Route::post('/cart/addNotes', [CartController::class, 'addNotes'])->name('cart.addNotes');
//remove notes from cart
Route::post('/cart/removeNotes', [CartController::class, 'removeNotes'])->name('cart.removeNotes');
//remove items from cart
Route::get('/cart/{id}/remove', [CartController::class, 'destroy'])->name('cart.remove');
//remove all items in cart
Route::get('/cart/removeAll', function () {
    Session::forget('cart');
    return redirect()->route('home');
})->name('cart.removeAll');

//orders
Route::get('/order', [OrderController::class, 'index'])->name('order.index');

//payment
Route::post('/payment', [PaymentController::class, 'attemp_payment'])->name('payment.attemp_payment');

//payment result
Route::get('/payment-result', [PaymentController::class, 'payment_result'])->name('payment.payment_result');

//dashboard 
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
//edit user details
Route::get('/dashboard/user/update', [DashboardController::class, 'updateUserDetailsIndex'])->name('dashboard.user.update.index');
Route::post('/dashboard/user/update', [DashboardController::class, 'updateUserDetails'])->name('dashboard.user.update');

//order history
Route::get('/dashboard/orders-history', [DashboardController::class, 'displayOrderHistory'])->name('dashboard.order-history.index');
//order past orders
Route::post('/dashboard/orders-history/order', [DashboardController::class, 'orderPastOrders'])->name('dashboard.orders.store');

//admin/user
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::get('/admin/users', [AdminController::class, 'usersIndex'])->name('admin.users.index');
Route::get('/admin/users/update/{user:name}', [AdminController::class, 'updateUserIndex'])->name('admin.user.update.index');
Route::post('/admin/users/update', [AdminController::class, 'updateUser'])->name('admin.user.update');
Route::post('/admin/users/delete', [AdminController::class, 'deleteUser'])->name('admin.user.delete');


//admin/menu
Route::get('/admin/menu', [AdminController::class, 'menuIndex'])->name('admin.menu.index');
Route::get('/admin/menu/items/create', [AdminController::class, 'createMenuItemsIndex'])->name('admin.menu.items.create.index');
Route::post('/admin/menu/items/create', [AdminController::class, 'createMenuItems'])->name('admin.menu.items.create');
Route::get('/admin/menu/update/{item:name}', [AdminController::class, 'updateMenuIndex'])->name('admin.menu.update.index');
Route::post('/admin/menu/items/update', [AdminController::class, 'updateMenuItems'])->name('admin.menu.items.update');
Route::post('/admin/menu/items/delete', [AdminController::class, 'deleteMenuItems'])->name('admin.menu.items.delete');
Route::post('/admin/menu/items/updateImage', [AdminController::class, 'updateMenuItemImage'])->name('admin.menu.items.image.update');

//admin/onlineShop
Route::get('/admin/onlineShop', [OnlineShopController::class, 'index'])->name('onlineShop.index');
Route::post('/admin/onlineShop/update', [OnlineShopController::class, 'updateStatus'])->name('onlineShop.update');

//admin/onlineShop/orders
Route::post('/admin/onlineShop/orders/updateStatus', [OnlineShopController::class, 'updateOrdersStatus'])->name('onlineShop.orders.update');
Route::get('/admin/onlineShop/orders/past24hours', [OnlineShopController::class, 'OrdersIndex'])->name('onlineShop.orders.index');
Route::get('/admin/onlineShop/orders/history', [OnlineShopController::class, 'OrdersHistoryIndex'])->name('onlineShop.orders.history.index');
Route::post('/admin/onlineShop/orders/getData', [OnlineShopController::class, 'getOrdersData'])->name('onlineShop.orders.getData');



