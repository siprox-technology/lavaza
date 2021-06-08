<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;

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
    return view('index');
});


//register
Route::get('/register',[RegisterController::class,'index'])->name('register.index');
/* Route::post('/register',[RegisterController::class,'store'])->name('register'); */
//email verification
/* Route::get('/email/verify/{id}/{hash}',[RegisterController::class,'verifyEmail'])->name('verification.verify'); */
//resend verification email
/* Route::post('/email/verification-notification',[RegisterController::class,'sendVerifyEmail'] )->name('verification.send'); */
