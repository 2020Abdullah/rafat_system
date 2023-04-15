<?php

use App\Http\Controllers\AgentController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ManagerController;
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

Route::get('/vistors', function(){
    return view('form');
});

Route::middleware('guest')->group(function(){
    Route::get('/', function () {
        return view('auth.login');
    });
});

Auth::routes();

/*------------------------------------------
--------------------------------------------
All admin Users Routes List
--------------------------------------------
--------------------------------------------*/

Route::middleware(['auth' , 'user-role:admin'])->group(function(){
    Route::group(['prefix' => 'admin'] , function(){
        Route::get('dashboard', [HomeController::class, 'adminHome'])->name('admin.dashboard');
        /* admin control moduls*/
        Route::get('Manager/index', [ManagerController::class, 'index'])->name('admin.manager.index');
        Route::get('Manager/add', [ManagerController::class, 'create'])->name('admin.manager.create');
        Route::post('Manager/store', [ManagerController::class, 'store'])->name('admin.manager.store');
        /* agent control moduls*/
        Route::get('agent/index', [AgentController::class, 'index'])->name('admin.agent.index');
        Route::get('agent/add', [AgentController::class, 'create'])->name('admin.agent.create');
        Route::post('agent/store', [AgentController::class, 'store'])->name('admin.agent.store');
    });
});

/*------------------------------------------
--------------------------------------------
All Agent Users Routes List
--------------------------------------------
--------------------------------------------*/

Route::middleware(['auth' , 'user-role:agent'])->group(function(){
    Route::get('Agent/dashboard', [HomeController::class, 'agentHome'])->name('Agent.dashboard');
});

/*------------------------------------------
--------------------------------------------
All manager Users Routes List
--------------------------------------------
--------------------------------------------*/

Route::middleware(['auth' , 'user-role:manager'])->group(function(){
    Route::group(['prefix' => 'manager'], function(){
        Route::get('dashboard', [HomeController::class, 'managerHome'])->name('manager.dashboard');
        /* agent control moduls */
        Route::get('agent/index', [AgentController::class, 'index'])->name('manager.agent.index');
        Route::get('agent/add', [AgentController::class, 'create'])->name('manager.agent.create');
        Route::post('agent/store', [AgentController::class, 'store'])->name('manager.agent.store');
    });
});
