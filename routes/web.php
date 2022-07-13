<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\PeopleController;
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


Route::controller(UserController::class)->group(function(){
    Route::get('/admin/users', 'index')->name('users');
});

Route::controller(PeopleController::class)->group(function(){
    Route::get('/admin/people/peoples', 'index')->name('peoples');
    Route::get('/admin/people/createpeople', 'create')->name('createpeople');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/teste', [App\Http\Controllers\HomeController::class, 'teste'])->name('teste');
Auth::routes();

