<?php

use Illuminate\Support\Facades\Route;
use Modules\UserManaging\Http\Controllers\MyLoginController;
use Modules\UserManaging\Http\Controllers\MyRegisterController;
use Modules\UserManaging\Http\Controllers\UserManagingController;

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

Route::group([], function () {
    Route::resource('usermanaging', UserManagingController::class)->names('usermanaging');
    Route::get('/mylogin', [MyLoginController::class, 'getLogin'])->name('mylogin.get');
    Route::post('/mylogin', [MyLoginController::class, 'postLogin'])->name('mylogin.post');
    Route::get('/myregister', [MyRegisterController::class, 'getReg'])->name('myregister.get');
    Route::post('/myregister', [MyRegisterController::class, 'postReg'])->name('myregister.post');
    Route::get('/mylogout', [MyLoginController::class, 'mylogout'])->name('mylogout')->middleware('myauth');
});


