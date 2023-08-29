<?php

use App\Http\Controllers\Admin\AdminPageController;
use App\Http\Controllers\Admin\Auth\AdminAuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\User\Auth\UserAuthController;
use App\Http\Controllers\User\UserPageController;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
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


Route::get('/plans', [PageController::class, 'plans'])->name('plans');


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
    Route::get('/dashboard', [AdminPageController::class, 'dashboard'])->name('dashboard');


    //miner rotues
    Route::get('/miners', [AdminPageController::class, 'miners'])->name('miners');

    Route::get('/add-miner', [AdminPageController::class, 'addMiner'])->name('add.miner');

    Route::post('/create-miner', [AdminPageController::class, 'createMiner'])->name('create.miner');

    Route::get('/edit-miner/{id}', [AdminPageController::class, 'editMiner'])->name('edit.miner');

    Route::post('/update-miner', [AdminPageController::class, 'updateMiner'])->name('update.miner');
    //end of miner routes

    //plan routes

    Route::get('/plans', [AdminPageController::class, 'plans'])->name('plans');

    Route::get('/add-plan', [AdminPageController::class, 'addPlan'])->name('add.plan');

    Route::post('/create-plan', [AdminPageController::class, 'createPlan'])->name('create.plan');

    Route::get('/edit-plan/{id}', [AdminPageController::class, 'editPlan'])->name('edit.plan');

    Route::post('/update-plan', [AdminPageController::class, 'updatePlan'])->name('update.plan');


    //end of plan routes




    Route::post('/admin-logout', [AdminPageController::class, 'adminLogout'])->name('logout');

    //end of logged in admin routes


    Route::post('/admin-custom-login', [AdminAuthController::class, 'adminLoginCustom'])->name('login.custom');
    Route::get('/login', [AdminAuthController::class, 'adminLogin'])->name('login');
});


Route::get('/storage/{folder}/{filename}', function ($folder, $filename) {
    $path = storage_path('app/public/' . $folder . '/' . $filename);

    if (!File::exists($path)) {
        abort(404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});
