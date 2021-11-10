<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegformController;

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

Route::get('/home',[RegformController::class,'index']);
Route::get('/select_state',[RegformController::class,'select_state']);
Route::post('/regform',[RegformController::class,'register']);
Route::get('/display',[RegformController::class,'display']);


