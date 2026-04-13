<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\EditoraController;


Route::get('/', function () {
    return view('welcome');
});


//ROTAS LIVRO-------------------------------------------------------------------------------------------------
Route::get('/livro/cadastrar',[LivroController::class, 'cadastro'])
->name('livro.cadastro');

Route::post('/livro/salvar',[LivroController::class, 'add'])
->name('livro.salvar');

Route::get('/livro/listar',[LivroController::class, 'listar'])
->name('livro.listar');

//ROTAS EDITORA----------------------------------------------------------------------------------------------
Route::get('/editora/cadastrar', function () {
    return view('cadastroEditora');
})->name('editora.cadastro');

Route::post('/editora/salvar',[EditoraController::class, 'add'])
->name('editora.salvar');

Route::get('/editora/listar',[EditoraController::class, 'listarEditora'])->name('editora.listar');