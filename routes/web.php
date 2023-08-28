<?php

use App\Http\Controllers\Admin\AdminPageController;
use App\Http\Controllers\Admin\Auth\AdminAuthController;
use App\Http\Controllers\User\Auth\UserAuthController;
use App\Http\Controllers\User\UserPageController;
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
})->name('home');

Route::get('/about', function () {
    return view('Pages/About');
})->name('about');

Route::get('/404', function () {
    return view('Pages/404');
})->name('404');

Route::get('/contact', function () {
    return view('Pages/Contact');
})->name('contact');

Route::get('/faq', function () {
    return view('Pages/Faq');
})->name('faq');

Route::get('/feature', function () {
    return view('Pages/Features');
})->name('feature');

Route::get('/roadmap', function () {
    return view('Pages/Roadmap');
})->name('roadmap');
Route::get('/service', function () {
    return view('Pages/Service');
})->name('service');

Route::get('/token', function () {
    return view('Pages/Token');
})->name('token');




Route::name('user.')->prefix('user')->group(function () {

    //logged in user routes

    Route::get('/dashboard', [UserPageController::class, 'dashboard'])->name('dashboard');
    Route::get('purchase', [UserPageController::class, 'purchase'])->name('purchase');
    Route::get('withdraw', [UserPageController::class, 'withdraw'])->name('withdraw');
    Route::get('referral', [UserPageController::class, 'referral'])->name('referral');
    Route::get('settings', [UserPageController::class, 'settings'])->name('settings');

    // end of logged in user routes


    Route::get('logoutother', [UserPageController::class, 'logoutother'])->name('logoutother');
});



Route::get('login', [UserAuthController::class, 'Login'])->name('login');
Route::post('custom-login', [UserAuthController::class, 'customLogin'])->name('login.custom');
Route::get('registration', [UserAuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [UserAuthController::class, 'customRegistration'])->name('register.custom');
Route::get('signout', [UserAuthController::class, 'signOut'])->name('signout');




Route::name('admin.')->prefix('admin')->group(function () {


    //logged in admin routes
    Route::get('/dashboard', [AdminPageController::class, 'dashboard'])->name('admin.dashboard');
    //end of logged in admin routes


    Route::post('/admin-custom-login', [AdminAuthController::class, 'adminLoginCustom'])->name('login.custom');
    Route::get('/login', [AdminAuthController::class, 'adminLogin'])->name('login');
});
