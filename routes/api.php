<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Cargo\CargosController;
use App\Http\Controllers\Filial\FiliaisController;
use App\Http\Controllers\Modelo\ModelosController;
use App\Http\Controllers\Automovel\AutomoveisController;
use App\Http\Controllers\Categoria\CategoriasController;
use App\Http\Controllers\Funcionario\FuncionariosController;

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
Route::get('/', function () {
    return response()->json(['message' => 'PicPayAPI API', 'status' => 'Connected']);
});

Route::resource('filiais', 'Filial\FiliaisController');
Route::resource('funcionarios', 'Funcionario\FuncionariosController');
Route::resource('automoveis', 'Automovel\AutomoveisController');
Route::resource('cargos', 'Cargo\CargosController');
Route::resource('modelos', 'Modelo\ModelosController');
Route::resource('categorias', 'Categoria\CategoriasController');
