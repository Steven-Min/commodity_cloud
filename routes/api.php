<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MasterController;
use Illuminate\Support\Facades\Auth;
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
Route::post('logout', [UserController::class, 'logout'])->middleware('auth:sanctum');
Route::post('checkauth', [UserController::class, 'checkAuth']);
Auth::routes(['verify' => true]);

Route::get('categories', [MasterController::class, 'categories']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
