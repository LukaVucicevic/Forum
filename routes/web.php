<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\CreateController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TemeController;
use App\Http\Controllers\UserController;

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

//index
Route::get('/',[TemeController::class,'index']);

//komentarisanje
Route::get('/tema/{id}',[TemeController::class,'show']);

//registracija
Route::get('/registrate',[UserController::class,'create']);

Route::post('/users',[UserController::class,'store']);

Route::get('/logout',[UserController::class,'logout']);

Route::get('/login',[UserController::class,'login']);

Route::post('/users/login',[UserController::class,'authenticate']);

Route::post('/tema/{id}/comment',[TemeController::class,'store']);

Route::get('/napravi',[CreateController::class,'show']);

Route::post('/napravi/napravi-temu',[CreateController::class,'store']);


