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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::get('partners', [\App\Http\Controllers\PartnerController::class, 'index']);
Route::post('partners', [\App\Http\Controllers\PartnerController::class, 'store']);
Route::get('partners/{id}', [\App\Http\Controllers\PartnerController::class, 'show']);
Route::put('partners/{id}', [\App\Http\Controllers\PartnerController::class, 'update']);
Route::delete('partners/{id}', [\App\Http\Controllers\PartnerController::class, 'delete']);
