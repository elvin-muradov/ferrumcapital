<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

// Custom Auth Routes
Route::get('/register',[RegisterController::class,'show'])->name('reg.index');
Route::post('/register/create',[RegisterController::class,'reg'])->name('reg');
Route::get('/login',[LoginController::class,'show'])->name('log.index');
Route::post('/login/loading',[LoginController::class,'log'])->name('log');
Route::get('/logout',[LoginController::class,'logout'])->name('logout');
Route::get('/dashboard',function(){
    return view('auth.dashboard');
});

// Blog Routes
Route::prefix('dashboard')->middleware(['auth'])->name('dashboard.')->group(function(){
    Route::resource('blog', BlogController::class);
});



