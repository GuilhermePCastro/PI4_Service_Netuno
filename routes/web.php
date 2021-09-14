<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;

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

