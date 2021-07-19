<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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

Route::get('/', [Controllers\NumbersController::class,'index']);
Route::get('/id/{id}', [Controllers\NumbersController::class,'id']);
Route::post('/', [Controllers\NumbersController::class,'calculate']);
