<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Editor\EditorController;

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
// for editor
Route::get('editor/login',[EditorController::class,'login'])->name('editor.login')->middleware('guest');
Route::post('editor/store',[EditorController::class,'store'])->name('editor.store')->middleware('guest');
Route::middleware('editor')->group(function(){
    Route::prefix('editor')->as('editor.')->controller(EditorController::class)->group(function(){
        Route::get('/dashboard','dashboard')->name('dashboard');
        Route::post('/logout','logout')->name('logout');
    });
});
