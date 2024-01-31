<?php

use App\Http\Controllers\AgentController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\ProductController;
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

############################# Start Games Routes #############################

Route::group([
    'prefix' => 'game'
], function () {
    Route::get('', [GameController::class, 'index']);
    Route::get('{gameId}', [GameController::class, 'getGame']);
    Route::get('gamesByCategory?cat_id={categoryId}', [GameController::class, 'getGamesByCategory']);
    Route::post('create', [GameController::class, 'store']);
    Route::patch('update', [GameController::class, 'update']);
    Route::delete('delete', [GameController::class, 'delete']);
});

############################# End Games Routes #############################

############################# Start Product Routes #############################

Route::group([
    'prefix' => 'product'
], function () {
    Route::get('', [ProductController::class, 'index']);
    Route::get('{productId}', [ProductController::class, 'getProduct']);
    Route::get('productsByGame?game_id={gameId}', [ProductController::class, 'getGamesByGame']);
    Route::post('create', [ProductController::class, 'store']);
    Route::patch('update', [ProductController::class, 'update']);
    Route::delete('delete', [ProductController::class, 'delete']);
});

############################# End Product Routes #############################

############################# Start Agent Routes #############################

Route::group([
    'prefix' => 'agent'
], function () {
    Route::get('', [AgentController::class, 'index']);
    Route::get('{gameId}', [AgentController::class, 'getAgent']);
    Route::post('create', [AgentController::class, 'store']);
    Route::patch('update', [AgentController::class, 'update']);
    Route::delete('delete', [AgentController::class, 'delete']);
});

############################# End Agent Routes #############################
