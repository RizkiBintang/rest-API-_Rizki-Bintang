<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
use App\Http\Controllers\ProductController;

Route::post('/product',[ProductController::class,'store']);
Route::get('/product',[ProductController::class,'showAll']);
Route::put('/product/{id}',[ProductController::class,'update']);
Route::delete('/product/{id}',[ProductController::class,'Delete']);