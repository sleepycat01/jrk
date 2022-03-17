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

Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
Route::post('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('admins', App\Http\Controllers\AdminController::class);
    Route::resource('profiles', \App\Http\Controllers\ProfileController::class);
    Route::resource('roles', \App\Http\Controllers\RoleController::class);
    Route::resource('permissions', \App\Http\Controllers\PermissionController::class);
    Route::get('activities', [App\Http\Controllers\ActivityLogController::class, 'index'])->name('activities.index');

    Route::resource('machines', \App\Http\Controllers\MachineController::class);
    Route::resource('molds', \App\Http\Controllers\MoldController::class);
    Route::resource('ng', \App\Http\Controllers\NGController::class);
    Route::resource('inventories', \App\Http\Controllers\InventoryController::class);
});
