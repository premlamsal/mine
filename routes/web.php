<?php

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
