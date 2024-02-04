<?php

use App\Http\Controllers\AgentController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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

############################# Start User Routes #############################

Route::group([
    'prefix' => 'user'
], function () {
    Route::get('', [UserController::class, 'index']);
    Route::get('getUser', [UserController::class, 'getUser']);
    Route::patch('update', [UserController::class, 'update']);
    Route::delete('delete', [UserController::class, 'delete']);
});

############################# End User Routes #############################

############################# Start Category Routes #############################

Route::group([
    'prefix' => 'category'
], function () {

    Route::get('', [CategoryController::class, 'index']);
    Route::get('{categoryId}', [CategoryController::class, 'getCategory']);
});

############################# End Category Routes #############################

############################# Start Games Routes #############################

Route::group([
    'prefix' => 'games'
], function () {

    Route::get('', [GameController::class, 'index']);
    Route::get('{gameId}', [GameController::class, 'getGame']);
    Route::get('gamesByCategory?cat_id={categoryId}', [GameController::class, 'getGamesByCategory']);


});

############################# End Games Routes #############################

############################# Start Product Routes #############################

Route::group([
    'prefix' => 'product'
], function () {

    Route::get('', [ProductController::class, 'index']);
    Route::get('{productId}', [ProductController::class, 'getProduct']);
    Route::get('productsByGame?game_id={gameId}', [ProductController::class, 'getGamesByGame']);


});

############################# End Product Routes #############################

############################# Start Agent Routes #############################

Route::group([
    'prefix' => 'agent'
], function () {

    Route::get('', [AgentController::class, 'index']);
    Route::get('{agentId}', [AgentController::class, 'getAgent']);

    Route::post('create', [AgentController::class, 'store']);
    Route::patch('update/{agentId}', [AgentController::class, 'update']);
    Route::delete('delete/{agentId}', [AgentController::class, 'delete']);
});

############################# End Agent Routes #############################

############################# Start Order Routes #############################

Route::group([
    'prefix' => 'order'
], function () {

    Route::get('', [OrderController::class, 'index']);
    Route::get('getOrder', [OrderController::class, 'getUserOrder']);
    Route::post('create', [OrderController::class, 'create']);

    Route::patch('update/{orderId}', [OrderController::class, 'update']);
    Route::delete('delete/{orderId}', [OrderController::class, 'delete']);
});

############################# End Order Routes #############################

############################# Start Admin Routes #############################


Route::group(['middleware' => 'check.user'], function () {

    ############################# Start Category Routes #############################

    Route::post('category/create', [CategoryController::class, 'store']);
    Route::patch('category/update', [CategoryController::class, 'update']);
    Route::delete('category/delete', [CategoryController::class, 'delete']);

    ############################# End Category Routes #############################

    ############################# Start Games Routes #############################

    Route::post('games/create', [GameController::class, 'store']);
    Route::patch('games/update', [GameController::class, 'update']);
    Route::delete('games/delete', [GameController::class, 'delete']);

    ############################# End Games Routes #############################

    ############################# Start Product Routes #############################

    Route::post('product/create', [ProductController::class, 'store']);
    Route::patch('product/update', [ProductController::class, 'update']);
    Route::delete('product/delete', [ProductController::class, 'delete']);

    ############################# End Product Routes #############################

    ############################# Start Product Routes #############################

    Route::post('games/create', [GameController::class, 'store']);
    Route::patch('games/update', [GameController::class, 'update']);
    Route::delete('games/delete', [GameController::class, 'delete']);

    ############################# End Games Routes #############################
});

############################# Start Admin Routes #############################
