<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

/*------------------------------------------
--------------------------------------------
All Users Routes List
--------------------------------------------
--------------------------------------------*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

/*------------------------------------------
--------------------------------------------
All admin Users Routes List
--------------------------------------------
--------------------------------------------*/

Route::middleware('auth')->group(function(){
    Route::get('admin/dashboard', [HomeController::class, 'adminHome'])->name('admin.dashboard');
});

/*------------------------------------------
--------------------------------------------
All Agent Users Routes List
--------------------------------------------
--------------------------------------------*/

Route::middleware('auth')->group(function(){
    Route::get('Agent/dashboard', [HomeController::class, 'agentHome'])->name('Agent.dashboard');
});

/*------------------------------------------
--------------------------------------------
All manager Users Routes List
--------------------------------------------
--------------------------------------------*/

Route::middleware('auth')->group(function(){
    Route::get('manager/dashboard', [HomeController::class, 'managerHome'])->name('manager.dashboard');
});
