<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

############################# Start Auth Routes #############################

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);
});

############################# End Auth Routes #############################

############################# Start Category Routes #############################

Route::group([
    'prefix' => 'category'
], function () {
    Route::get('', [CategoryController::class, 'index']);
    Route::get('{categoryId}', [CategoryController::class, 'getCategory']);
    Route::post('create', [CategoryController::class, 'store']);
    Route::patch('update', [CategoryController::class, 'update']);
    Route::delete('delete', [CategoryController::class, 'delete']);
});

############################# End Category Routes #############################
