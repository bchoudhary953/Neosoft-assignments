<?php

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
    return view('welcome');
});
 Route::match(['get','post'],'/add-user', [App\Http\Controllers\UserController::class, 'index']);
    Route::match(['get','post'],'/view-users', [App\Http\Controllers\UserController::class, 'viewUsers']);
    Route::match(['get','post'],'/edit-user/{id}', [App\Http\Controllers\UserController::class, 'editUser']);
     Route::post('/update-status', [App\Http\Controllers\UserController::class, 'updateStatus']);
      Route::post('/save', [App\Http\Controllers\UserController::class, 'store']);
