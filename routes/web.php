<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CitizenController;

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

Route::middleware('auth')->prefix('/dashboard')->group(function(){
    Route::get('/', [CitizenController::class,'index'])->name('dashboard');
    Route::get('/register',[CitizenController::class,'register']);
    Route::post('/register', [CitizenController::class,'store']);
});


require __DIR__.'/auth.php';
