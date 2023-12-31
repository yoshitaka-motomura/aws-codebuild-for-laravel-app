<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->prefix('api')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    })->name('api.user');

    Route::get('/demo', function () {
        return response()->json([
            'message' => 'auth demo',
        ], 200);
    })->name('api.demo');
});

Route::get('/api/message', function () {
    return response()->json([
        'message' => 'Hello World! Laravel 10',
    ], 200);
});
