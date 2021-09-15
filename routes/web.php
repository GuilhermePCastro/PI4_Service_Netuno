<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\MarcaController;

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

Route::get('/', function () {
    return view('welcome');
});


// Categoria
Route::get('/categoria', [CategoriaController::class, 'index'])->name('categoria.index');
Route::get('/categoria/create', [CategoriaController::class, 'create'])->name('categoria.create');
Route::post('/categoria', [CategoriaController::class, 'store'])->name('categoria.store');
Route::get('/categoria/{categoria}/edit', [CategoriaController::class, 'edit'])->name('categoria.edit');
Route::patch('/categoria/{categoria}', [CategoriaController::class, 'update'])->name('categoria.update');
Route::delete('/categoria/{categoria}', [CategoriaController::class, 'destroy'])->name('categoria.destroy');
Route::get('/categoria/filtro', [CategoriaController::class, 'filtro'])->name('categoria.filtro');

// Tag
Route::get('/tag', [TagController::class, 'index'])->name('tag.index');
Route::get('/tag/create', [TagController::class, 'create'])->name('tag.create');
Route::post('/tag', [TagController::class, 'store'])->name('tag.store');
Route::get('/tag/{tag}/edit', [TagController::class, 'edit'])->name('tag.edit');
Route::patch('/tag/{tag}', [TagController::class, 'update'])->name('tag.update');
Route::delete('/tag/{tag}', [TagController::class, 'destroy'])->name('tag.destroy');
Route::get('/tag/filtro', [TagController::class, 'filtro'])->name('tag.filtro');
Route::get('/lixeira/tag', [TagController::class, 'trash'])->name('tag.trash');
Route::patch('/tag/restaura/{id}', [TagController::class, 'restore'])->name('tag.restore');

//Marca
Route::get('/marca', [MarcaController::class, 'index'])->name('marca.index');
Route::get('/marca/create', [MarcaController::class, 'create'])->name('marca.create');
Route::post('/marca', [MarcaController::class, 'store'])->name('marca.store');
Route::get('/marca/{marca}/edit', [MarcaController::class, 'edit'])->name('marca.edit');
Route::patch('/marca/{marca}', [MarcaController::class, 'update'])->name('marca.update');
Route::delete('/marca/{marca}', [MarcaController::class, 'destroy'])->name('marca.destroy');
Route::get('/marca/filtro', [MarcaController::class, 'filtro'])->name('marca.filtro');

