<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AuthController;
use GuzzleHttp\Middleware;


use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

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
    return view('welcome');
});

// Route::post('/authe/save', [MainController::class, 'save'])->name('authe.save');
// Route::post('/authe/check', [MainController::class, 'check'])->name('authe.check');
// Route::get('/authe/logout', [MainController::class, 'logout'])->name('authe.logout');

// Route::group(['middleware' => ['AuthCheck']], function () {
//     Route::get('/authe/dashboard', [MainController::class, 'dashboard']);
//     Route::get('/authe/login', [MainController::class, 'login'])->name('authe.login');
//     Route::get('/authe/register', [MainController::class, 'register'])->name('authe.register');
// });

Route::middleware(['middleware'=>'PreventBackHistory'])->group(function (){
    Auth::routes();
});
 

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');





//NEW
Route::group(['prefix'=>'admin','middleware'=>['isAdmin','auth','PreventBackHistory']], function(){
    Route::get('dashboard',[AdminController::class,'index'])->name('admin.dashboard');
    Route::get('profile',[AdminController::class,'profile'])->name('admin.profile');

    Route::post('update-profile-info',[AdminController::class,'updateInfo'])->name('adminUpdateInfo');
});

Route::group(['prefix'=>'user','middleware'=>['isUser','auth','PreventBackHistory']], function(){
    Route::get('dashboard',[UserController::class,'index'])->name('user.dashboard');
    Route::get('profile',[UserController::class,'profile'])->name('user.profile');
});

