<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestamentoController;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\VersiculoController;

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



Route::prefix('/livro')->group(function () {

    Route::get('/', [LivroController::class, 'index']);

    Route::get('/{id}', [LivroController::class, 'show']);

    Route::post('/', [LivroController::class, 'store']);

    Route::put('/{id}', [LivroController::class, 'update']);

    Route::delete('/{id}', [LivroController::class, 'destroy']);
});

Route::prefix('/versiculo')->group(function () {

    Route::get('/', [VersiculoController::class, 'index']);

    Route::get('/{id}', [VersiculoController::class, 'show']);

    Route::post('/', [VersiculoController::class, 'store']);

    Route::put('/{id}', [VersiculoController::class, 'update']);

    Route::delete('/{id}', [VersiculoController::class, 'destroy']);
});

Route::prefix('/testamento')->group(function () {

    Route::get('/', [TestamentoController::class, 'index']);

    Route::get('/{id}', [TestamentoController::class, 'show']);

    Route::post('/', [TestamentoController::class, 'store']);

    Route::put('/{id}', [TestamentoController::class, 'update']);

    Route::delete('/{id}', [TestamentoController::class, 'destroy']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
