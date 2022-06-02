<?php

use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\JwtAuthController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return auth()->user();
});

// CRUD Routen
/**
 * C - Create
 * R - Read
 * U - Update
 * D - Delete
 */
Route::apiResource('post', PostController::class)
    ->middleware(['auth:jwt']);

Route::post('login', [JwtAuthController::class, 'login']);
