<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PartyController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SongController;
use App\Http\Controllers\HomeController;

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



//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Procesa de los CRUD las rutas (get,post,put,delete) en solo una linea de codigo
Route::resource('parties', PartyController::class);

Route::resource('songs', SongController::class);

Route::resource('users', UserController::class);

Route::resource('roles', RoleController::class);

/*-----------------------------------------------*/
Auth::routes();
  
/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:user'])->group(function () {
  
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});
  
/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:admin'])->group(function () {
  
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
});
  
/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:manager'])->group(function () {
  
    Route::get('managerHome', [HomeController::class, 'managerHome'])->name('manager.home');
});
 


Route::get('/djSong', function () {
    return view('djSong');
});
Route::get('/djHome', function () {
    return view('djHome');
});
Route::get('/djParty', function () {
    return view('djHome');
});
Route::get('/userParty', function () {
    return view('userParty');
});

Route::get('/userSong', function () {
    return view('userSong');
});

Route::get('/admin.home', function () {
    return view('homeAdmin');
});

Route::get('/homeAdmin', function () {
    return view('homeAdmin');
});
