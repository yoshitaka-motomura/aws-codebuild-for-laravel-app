<?php

use Illuminate\Support\Facades\Route;

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

Route::get('api/demo', function () {
    return response()->json([
        'message' => 'Laravel 10 Demo',
    ], 200);
})->name('api.demo');

Route::get('/api/message', function () {
    return response()->json([
        'message' => 'Hello World! Laravel 10',
    ], 200);
});

Route::get('/api/config', function() {
    $data = app('config')->get('app');
    return response()->json($data, 200);
});
