<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiProdutoController;
use App\Http\Controllers\ApiCategoriaController;
use App\Http\Controllers\ApiMarcaController;
use App\Http\Controllers\ApiTagController;
use App\Http\Controllers\ApiUserController;
use App\Http\Controllers\ApiClienteController;
use App\Http\Controllers\ApiEnderecoController;
use App\Http\Controllers\ApiCarrinhoController;

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

// Só acessa com token
Route::group(['middleware' => 'auth:sanctum'], function(){

    //User
    Route::get('/user', [ApiUserController::class, 'show']);
    Route::get('/user/{user}', [ApiUserController::class, 'showUnique']);
    Route::post('/user', [ApiUserController::class, 'store']);
    Route::delete('/user/{user}', [ApiUserController::class, 'destroy']);
    Route::put('/user/{user}', [ApiUserController::class, 'update']);

    //Cliente
    Route::post('/cliente', [ApiClienteController::class, 'store']);
    Route::get('/cliente/{cliente}', [ApiClienteController::class, 'show']);
    Route::delete('/cliente/{cliente}', [ApiClienteController::class, 'destroy']);
    Route::put('/cliente/{cliente}', [ApiClienteController::class, 'update']);
    Route::get('/cliente/{cliente}/enderecos', [ApiClienteController::class, 'enderecos']);

    //Endereco
    Route::get('/endereco/index', [ApiEnderecoController::class, 'index']);
    Route::get('/endereco/{endereco}', [ApiEnderecoController::class, 'show']);
    Route::post('/endereco', [ApiEnderecoController::class, 'store']);
    Route::delete('/endereco/{endereco}', [ApiEnderecoController::class, 'destroy']);
    Route::put('/endereco/{endereco}', [ApiEnderecoController::class, 'update']);

    //Carrinho
    Route::get('/carrinho/add/{produto}', [ApiCarrinhoController::class, 'add']);
    Route::get('/carrinho/remove/{produto}', [ApiCarrinhoController::class, 'remove']);
    Route::get('/carrinho', [ApiCarrinhoController::class, 'show']);


});

//User
Route::post('/login', [ApiUserController::class, 'login']);
Route::get('/user/index', [ApiUserController::class, 'index']);


//Cliente
Route::get('/cliente/index', [ApiClienteController::class, 'index']);

//Produto
Route::get('/produto', [ApiProdutoController::class, 'index']);
Route::get('/produto/destaques', [ApiProdutoController::class, 'destaques']);
Route::get('/produto/{produto}', [ApiProdutoController::class, 'show']);

//Categoria
Route::get('/categoria', [ApiCategoriaController::class, 'index']);
Route::get('/categoria/{categoria}', [ApiCategoriaController::class, 'show']);
Route::get('/categoria/{categoria}/produtos', [ApiCategoriaController::class, 'produtos']);

//Marca
Route::get('/marca', [ApiMarcaController::class, 'index']);
Route::get('/marca/filtro', [ApiMarcaController::class, 'filtro']);
Route::get('/marca/{marca}', [ApiMarcaController::class, 'show']);
Route::get('/marca/{marca}/produtos', [ApiMarcaController::class, 'produtos']);

//Tag
Route::get('/tag', [ApiTagController::class, 'index']);
Route::get('/tag/filtro', [ApiTagController::class, 'filtro']);
Route::get('/tag/{tag}', [ApiTagController::class, 'show']);
Route::get('/tag/{tag}/produtos', [ApiTagController::class, 'produtos']);

