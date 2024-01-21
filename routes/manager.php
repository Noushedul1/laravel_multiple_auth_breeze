<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Manager\ManagerController;

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
// for manager
Route::get('manager/login',[ManagerController::class,'login'])->name('manager.login')->middleware('guest');
Route::post('manager/store',[ManagerController::class,'store'])->name('manager.store')->middleware('guest');
Route::middleware('manager')->group(function(){
    Route::prefix('manager')->as('manager.')->controller(ManagerController::class)->group(function(){
        Route::get('/dashboard','dashboard')->name('dashboard');
        Route::post('/logout','logout')->name('logout');
    });
});
