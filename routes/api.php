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
Route::get('/', function () {
    return response()->json(['message' => 'PicPayAPI API', 'status' => 'Connected']);
});

Route::resource('filiais', 'Filial\FiliaisController');
Route::resource('funcionarios', 'Funcionario\FuncionariosController');
Route::resource('automoveis', 'Automovel\AutomoveisController');
Route::resource('cargos', 'Cargo\CargosController');
