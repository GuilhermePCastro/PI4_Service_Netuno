<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiProdutoController;
use App\Http\Controllers\ApiCategoriaController;
use App\Http\Controllers\ApiMarcaController;
use App\Http\Controllers\ApiTagController;

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
    return $request->user();
});

//Produto
Route::get('/produto', [ApiProdutoController::class, 'index']);
Route::get('/produto/{produto}', [ApiProdutoController::class, 'show']);

//Categoria
Route::get('/categoria', [ApiCategoriaController::class, 'index']);
Route::get('/categoria/{categoria}', [ApiCategoriaController::class, 'show']);
Route::get('/categoria/{categoria}/produtos', [ApiCategoriaController::class, 'produtos']);


//Marca
Route::get('/marca', [ApiMarcaController::class, 'index']);
Route::get('/marca/{marca}', [ApiMarcaController::class, 'show']);
Route::get('/marca/{marca}/produtos', [ApiMarcaController::class, 'produtos']);

//Tag
Route::get('/tag', [ApiTagController::class, 'index']);
Route::get('/tag/{tag}', [ApiTagController::class, 'show']);
Route::get('/tag/{tag}/produtos', [ApiTagController::class, 'produtos']);
