<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserPageController;
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
    return view('Pages/Home');
});

Route::get('/about', function () {
    return view('Pages/About');
});

Route::get('/404', function () {
    return view('Pages/404');
});

Route::get('/contact', function () {
    return view('Pages/Contact');
});

Route::get('/faq', function () {
    return view('Pages/Faq');
});

Route::get('/feature', function () {
    return view('Pages/Features');
});

Route::get('/roadmap', function () {
    return view('Pages/Roadmap');
});
Route::get('/service', function () {
    return view('Pages/Service');
});

Route::get('/token', function () {
    return view('Pages/Token');
});



Route::name('user.')->prefix('user')->group(function () {
    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', [UserPageController::class, 'dashboard'])->name('dashboard');
        Route::get('purchase', [UserPageController::class, 'purchase'])->name('purchase');
        Route::get('withdraw', [UserPageController::class, 'withdraw'])->name('withdraw');
        Route::get('referral', [UserPageController::class, 'referral'])->name('referral');
        Route::get('settings', [UserPageController::class, 'settings'])->name('settings');
    });
});


Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('custom-login', [AuthController::class, 'customLogin'])->name('login.custom');
Route::get('registration', [AuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [AuthController::class, 'customRegistration'])->name('register.custom');
Route::get('signout', [AuthController::class, 'signOut'])->name('signout');
