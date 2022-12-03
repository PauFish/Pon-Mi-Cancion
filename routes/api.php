<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



/*Rutas de la API*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
   return $request->user();
});

