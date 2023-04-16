<?php

use App\Http\Controllers\Admin\AgentController as AdminAgentController;
use App\Http\Controllers\Admin\ManagerController as AdminManagerController;
use App\Http\Controllers\Agent\VistorsController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Manager\AgentController;
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


Route::get('/', function () {
    return view('auth.login');
})->middleware('guest');


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
        Route::get('Manager/index', [AdminManagerController::class, 'index'])->name('admin.manager.index');
        Route::get('Manager/add', [AdminManagerController::class, 'create'])->name('admin.manager.create');
        Route::post('Manager/store', [AdminManagerController::class, 'store'])->name('admin.manager.store');
        /* agent control moduls*/
        Route::get('agent/index', [AdminAgentController::class, 'index'])->name('admin.agent.index');
        Route::get('agent/add', [AdminAgentController::class, 'create'])->name('admin.agent.create');
        Route::post('agent/store', [AdminAgentController::class, 'store'])->name('admin.agent.store');
    });
});

/*------------------------------------------
--------------------------------------------
All Agent Users Routes List
--------------------------------------------
--------------------------------------------*/

Route::middleware(['auth:agent' , 'user-role:agent'])->group(function(){
    Route::get('Agent/dashboard', [HomeController::class, 'agentHome'])->name('Agent.dashboard');
    Route::get('visitors', [VistorsController::class, 'index'])->name('vistor.index');
    Route::get('visitors/create', [VistorsController::class, 'create'])->name('vistor.create');
});

/*------------------------------------------
--------------------------------------------
All manager Users Routes List
--------------------------------------------
--------------------------------------------*/

Route::middleware(['auth:manager' , 'user-role:manager'])->group(function(){
    Route::group(['prefix' => 'manager'], function(){
        Route::get('dashboard', [HomeController::class, 'managerHome'])->name('manager.dashboard');
        /* agent control moduls */
        Route::get('agent/index', [AgentController::class, 'index'])->name('manager.agent.index');
        Route::get('agent/add', [AgentController::class, 'create'])->name('manager.agent.create');
        Route::post('agent/store', [AgentController::class, 'store'])->name('manager.agent.store');
    });
});
