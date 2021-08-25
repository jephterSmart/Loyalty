<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CitizenController;

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

//All protected routes

Route::group(['middleware'=>'auth:sanctum'],function(){
    // What corps member should be allowed to do.
    Route::post('/auth/logout',[AuthController::class,'logout']);
    Route::post('/citizen/create', [CitizenController::class,'store']);
    Route::get('/citizen/records', [CitizenController::class,'index']);
    
});

//non protected
Route::prefix('/auth', function(){
    Route::post('register',[AuthController::class,'register']);
    Route::post('login',[AuthController::class,'login']);
});


