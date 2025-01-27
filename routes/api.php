<?php

use GuzzleHttp\Psr7\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;




/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('users',[LoginController::class,'index']);



Route::post('login',[LoginController::class,'login']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    //return $request->user();
    return Auth::user();

});
