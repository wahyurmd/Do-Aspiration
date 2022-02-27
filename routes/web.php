<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DataUserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the 'web' middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get( '/login', [ LoginController::class, 'index' ] )->name('login')->middleware('guest');
Route::post( '/login', [ LoginController::class, 'auth' ] );
Route::post( '/logout', [ LoginController::class, 'logout' ] );

Route::middleware(['auth'])->group(function () {
    Route::middleware(['ceklevel:Admin'])->group(function () {
        Route::get( '/dashboard', [ DashboardController::class, 'index' ] );

        Route::get( '/admin', [ AdminController::class, 'index' ] );
        Route::post( '/admin/{id}', [ AdminController::class, 'delAspiration' ] );

        Route::get( '/data-user', [ DataUserController::class, 'index' ] );
    });
    Route::middleware(['ceklevel:Mahasiswa'])->group(function () {
        Route::get( '/mhs/dashboard', [ DashboardController::class, 'index' ] );
        Route::post( '/mhs/dashboard', [ DashboardController::class, 'addAspiration' ] );
    });
});