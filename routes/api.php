<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\RegresController;
use App\Http\Controllers\FilterController;

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

Route::group(['prefix' => 'auth'], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);    
});

Route::group(['prefix' => 'regres'], function () {
    Route::post('/login', [RegresController::class, 'login']);
    Route::post('/register', [RegresController::class, 'register']);  
});

Route::get('/filter', [FilterController::class, 'filter']);

Route::resource('posts', PostController::class)->only([
   'index', 'show', 'store', 'update', 'destroy'
]);

Route::resource('articles', ArticleController::class)->only([
    'index', 'show', 'store', 'update', 'destroy'
 ]);

