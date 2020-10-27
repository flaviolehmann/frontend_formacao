<?php

use Illuminate\Support\Facades\Route;


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

Route::resource('filiais', 'Filial\FiliaisController')->except(['create', 'edit']);
Route::resource('funcionarios', 'Funcionario\FuncionariosController');
Route::resource('automoveis', 'Automovel\AutomoveisController')->except(['create', 'edit']);
Route::resource('cargos', 'Cargo\CargosController')->except(['create', 'edit']);
Route::resource('modelos', 'Modelo\ModelosController');
Route::resource('categorias', 'Categoria\CategoriasController');
