<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PartyController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SongController;
use App\Http\Controllers\HomeController;


Route::get('/', function () {
    return view('welcome');
});

//Procesa de los CRUD las rutas (get,post,put,delete) en solo una linea de codigo
Route::resource('parties', PartyController::class);

Route::resource('songs', SongController::class);

Route::resource('users', UserController::class);

Route::resource('roles', RoleController::class);

Auth::routes();
  
//Autenticación de usuario para acceder a home distintas segun rol
Route::middleware(['auth', 'user-access:user'])->group(function () {
  
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});
  
Route::middleware(['auth', 'user-access:admin'])->group(function () {
  
    Route::get('adminHome', [HomeController::class, 'adminHome'])->name('admin.home');
    
});

Route::middleware(['auth', 'user-access:manager'])->group(function () {
  
    Route::get('managerHome', [HomeController::class, 'managerHome'])->name('manager.home');
});
 
//rutas de enlace 
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

Route::get('/homeAdmin', function () {
    return view('homeAdmin');
});

