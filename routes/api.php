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
use App\Http\Controllers\ApiPedidoController;

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
    Route::get('/user/{user}', [ApiUserController::class, 'showUnique']);
    Route::get('/user', [ApiUserController::class, 'show']);
    Route::delete('/user/{user}', [ApiUserController::class, 'destroy']);
    Route::put('/user/{user}', [ApiUserController::class, 'update']);
    Route::get('/user/{user}/cliente', [ApiUserController::class, 'cliente']);

    //Cliente
    Route::post('/cliente', [ApiClienteController::class, 'store']);
    Route::get('/cliente/{cliente}', [ApiClienteController::class, 'show']);
    Route::delete('/cliente/{cliente}', [ApiClienteController::class, 'destroy']);
    Route::put('/cliente/{cliente}', [ApiClienteController::class, 'update']);
    Route::get('/cliente/{cliente}/enderecos', [ApiClienteController::class, 'enderecos']);
    Route::get('/cliente/{cliente}/pedidos', [ApiClienteController::class, 'pedidos']);

    //Endereco
    Route::get('/endereco/index', [ApiEnderecoController::class, 'index']);
    Route::get('/endereco/{endereco}', [ApiEnderecoController::class, 'show']);
    Route::post('/endereco', [ApiEnderecoController::class, 'store']);
    Route::delete('/endereco/{endereco}', [ApiEnderecoController::class, 'destroy']);
    Route::put('/endereco/{endereco}', [ApiEnderecoController::class, 'update']);

    //Carrinho
    Route::get('/carrinho/add/{produto}', [ApiCarrinhoController::class, 'add']);
    Route::get('/carrinho/remove/{produto}', [ApiCarrinhoController::class, 'remove']);
    Route::get('/carrinho/delete/{produto}', [ApiCarrinhoController::class, 'delete']);
    Route::get('/carrinho', [ApiCarrinhoController::class, 'show']);

    //Pedido
    Route::post('/pedido/add', [ApiPedidoController::class, 'add']);
    Route::get('/pedido', [ApiPedidoController::class, 'index']);
    Route::get('/pedido/{pedido}', [ApiPedidoController::class, 'show']);

});

//User
Route::get('/user/index', [ApiUserController::class, 'index']);
Route::post('/login', [ApiUserController::class, 'login']);



//Cliente
Route::get('/cliente/index', [ApiClienteController::class, 'index']);
Route::post('/user', [ApiUserController::class, 'store']);

//Produto
Route::get('/produto', [ApiProdutoController::class, 'index']);
Route::get('/produto/destaques', [ApiProdutoController::class, 'destaques']);
Route::get('/produto/lancamentos', [ApiProdutoController::class, 'lancamentos']);
Route::get('/produto/{produto}/foto', [ApiProdutoController::class, 'foto']);
Route::get('/produto/filtro', [ApiProdutoController::class, 'filtro']);
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

