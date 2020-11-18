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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/message', [App\Http\Controllers\HomeController::class, 'store'])->name('message');
Route::get('/message/{id}', [App\Http\Controllers\HomeController::class, 'show'])->name('message.show');

Route::get('/notifications', [App\Http\Controllers\NotificationController::class, 'index'])->name('notification.index');
Route::patch('/notifications/{id}', [App\Http\Controllers\NotificationController::class, 'read'])->name('notification.read');
Route::delete('/notifications/{id}', [App\Http\Controllers\NotificationController::class, 'destroy'])->name('notification.destroy');
