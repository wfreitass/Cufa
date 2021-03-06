<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\PeopleController;
use App\Http\Controllers\RegionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
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
    return redirect()->route('home');
});

Route::controller(UserController::class)->group(function () {
    Route::get('/admin/users', 'index')->name('users')->can('is_admin', Auth::user());
    Route::get('/admin/users/createuser', 'create')->name('createuser')->can('is_admin', Auth::user());
    Route::post('/admin/users/salveuser', 'store')->name('salveuser')->can('is_admin', Auth::user());
    Route::get('/admin/users/edituser/{id}','edit')->name('edituser');
    Route::put('/admin/users/updateuser/{id}', 'update')->name('updateuser');
    Route::delete('admin/user/destroyuser/{id}', 'destroy')->name('destroyuser')->can('is_admin', Auth::user());
    Route::post('/admin/users/searchuser', 'search')->name('searchuser')->can('is_admin', Auth::user());
});

Route::controller(PeopleController::class)->group(function () {
    Route::get('/admin/people/peoples', 'index')->name('peoples');
    Route::get('/admin/people/createpeople', 'create')->name('createpeople');
    Route::post('/admin/people/salvepeople', 'store')->name('salvepeople');
    Route::post('/admin/people/searchpeople', 'search')->name('searchpeople');
    Route::get('/admin/people/editpeople/{id}', 'edit')->name('editpeople');
    Route::put('/admin/people/updatepeople/{id}', 'update')->name('updatepeople');
    Route::delete('admin/people/destroypeople/{id}', 'destroy')->name('destroypeople')->can('destroy-people', Auth::user());
});

Route::controller(RegionController::class)->group(function () {
    Route::get('/admin/region/regions', 'index')->name('regions');
    Route::get('/admin/region/createregion', 'create')->name('createregion');
    Route::post('/admin/region/salveregion', 'store')->name('salveregion');
    Route::post('/admin/region/searchregion', 'search')->name('searchregion');
    Route::get('/admin/region/editregion/{id}', 'edit')->name('editregion');
    Route::put('/admin/region/updateregion/{id}', 'update')->name('updateregion');
    Route::delete('admin/region/destroyregion/{id}', 'destroy')->name('destroyregion')->can('destroy-people', Auth::user());
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();
