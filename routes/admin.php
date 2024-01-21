<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminController;

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
// for admin
Route::get('admin/login',[AdminController::class,'login'])->name('admin.login');
Route::post('admin/store',[AdminController::class,'store'])->name('admin.store');
Route::middleware('admin')->group(function(){
    Route::prefix('admin')->as('admin.')->controller(AdminController::class)->group(function(){
        Route::get('/dashboard','dashboard')->name('dashboard');
        Route::post('/logout','logout')->name('logout');
    });
});
