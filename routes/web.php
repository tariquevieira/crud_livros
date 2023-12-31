<?php

use App\Http\Controllers\AssuntoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutorController;
use App\Http\Controllers\LivroController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('livro.index');
});

Route::resource('autor', AutorController::class);
Route::resource('assunto', AssuntoController::class);
Route::resource('livro', LivroController::class);
Route::get('/autores-por-assunto-livro', [App\Http\Controllers\RelatorioAutoresController::class, 'autoresPorAssuntoQuantidaLivros'])->name('autor.relassuntolivros');

Auth::routes();
