<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\UsuarioAdminController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PedidoController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('auth/login');
});


//Acesso só de quem está logado
Route::group(['middleware' => 'auth'], function(){

    Route::get('/produto', [ProdutoController::class, 'index'])->name('produto.index');
    Route::get('/produto/create', [ProdutoController::class, 'create'])->name('produto.create');
    Route::post('/produto', [ProdutoController::class,'store'])->name('produto.store');
    Route::get('/produto/{produto}/edit', [ProdutoController::class,'edit'])->name('produto.edit');
    Route::patch('/produto/{produto}',[ProdutoController::class,'update'])->name('produto.update');
    Route::delete('/produto/{produto}',[ProdutoController::class,'destroy'])->name('produto.destroy');
    Route::get('/produto/filtro',[ProdutoController::class,'filtro'])->name('produto.filtro');
    Route::get('/lixeira/produto',[ProdutoController::class,'trash'])->name('produto.trash');
    Route::patch('/produto/restaura/{id}',[ProdutoController::class,'restore'])->name('produto.restore');

    //Categoria
    Route::get('/categoria',[CategoriaController::class,'index'])->name('categoria.index');
    Route::get('/categoria/create',[CategoriaController::class,'create'])->name('categoria.create');
    Route::post('/categoria',[CategoriaController::class,'store'])->name('categoria.store');
    Route::get('/categoria/{categoria}/edit',[CategoriaController::class,'edit'])->name('categoria.edit');
    Route::patch('/categoria/{categoria}',[CategoriaController::class,'update'])->name('categoria.update');
    Route::delete('/categoria/{categoria}',[CategoriaController::class,'destroy'])->name('categoria.destroy');
    Route::get('/categoria/filtro',[CategoriaController::class,'filtro'])->name('categoria.filtro');
    Route::get('/lixeira/categoria',[CategoriaController::class,'trash'])->name('categoria.trash');
    Route::patch('/categoria/restaura/{id}',[CategoriaController::class,'restore'])->name('categoria.restore');

    //Tag
    Route::get('/tag',[TagController::class,'index'])->name('tag.index');
    Route::get('/tag/create',[TagController::class,'create'])->name('tag.create');
    Route::post('/tag',[TagController::class,'store'])->name('tag.store');
    Route::get('/tag/{tag}/edit',[TagController::class,'edit'])->name('tag.edit');
    Route::patch('/tag/{tag}',[TagController::class,'update'])->name('tag.update');
    Route::delete('/tag/{tag}',[TagController::class,'destroy'])->name('tag.destroy');
    Route::get('/tag/filtro',[TagController::class,'filtro'])->name('tag.filtro');
    Route::get('/lixeira/tag',[TagController::class,'trash'])->name('tag.trash');
    Route::patch('/tag/restaura/{id}',[TagController::class,'restore'])->name('tag.restore');

    //Marca
    Route::get('/marca',[MarcaController::class,'index'])->name('marca.index');
    Route::get('/marca/create',[MarcaController::class,'create'])->name('marca.create');
    Route::post('/marca',[MarcaController::class,'store'])->name('marca.store');
    Route::get('/marca/{marca}/edit',[MarcaController::class,'edit'])->name('marca.edit');
    Route::patch('/marca/{marca}',[MarcaController::class,'update'])->name('marca.update');
    Route::delete('/marca/{marca}',[MarcaController::class,'destroy'])->name('marca.destroy');
    Route::get('/marca/filtro',[MarcaController::class,'filtro'])->name('marca.filtro');
    Route::get('/lixeira/marca',[MarcaController::class,'trash'])->name('marca.trash');
    Route::patch('/marca/restaura/{id}',[MarcaController::class,'restore'])->name('marca.restore');

    //Usuário
    Route::get('/usuario',[UsuarioAdminController::class,'index'])->name('usuario.index');
    Route::get('/usuario/create',[UsuarioAdminController::class,'create'])->name('usuario.create');
    Route::post('/usuario',[UsuarioAdminController::class,'store'])->name('usuario.store');
    Route::get('/usuario/{user}/edit',[UsuarioAdminController::class,'edit'])->name('usuario.edit');
    Route::patch('/usuario/{user}',[UsuarioAdminController::class,'update'])->name('usuario.update');
    Route::delete('/usuario/{user}',[UsuarioAdminController::class,'destroy'])->name('usuario.destroy');
    Route::get('/usuario/filtro',[UsuarioAdminController::class,'filtro'])->name('usuario.filtro');

    //Cliente
    Route::get('/cliente',[ClienteController::class,'index'])->name('cliente.index');
    Route::get('/cliente/{cliente}', [ClienteController::class, 'show'])->name('cliente.show');
    Route::get('/cliente/index/filtro', [ClienteController::class, 'filtro'])->name('cliente.filtro');

    //pedido
    Route::get('/pedido',[PedidoController::class,'index'])->name('pedido.index');
    Route::get('/pedido/{pedido}', [PedidoController::class, 'show'])->name('pedido.show');
    Route::put('/pedido/{pedido}', [PedidoController::class, 'update'])->name('pedido.update');
    Route::get('/pedido/index/filtro', [PedidoController::class, 'filtro'])->name('pedido.filtro');

});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

