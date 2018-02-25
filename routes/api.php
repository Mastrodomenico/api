<?php

use Illuminate\Http\Request;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('cors')->prefix('v1')->group(function(){

    Route::resource('indicacao','IndicacaoController');
    Route::get('indicacao/corretora/{id}','IndicacaoController@porCorretora_index');
    Route::get('indicacao/clienteagente/{id}','IndicacaoController@porClienteAgente_index');

    Route::resource('clientesagentes','ClienteAgenteController');

    Route::resource('tiposseguros','TipoSeguroController');
    Route::get('tiposseguros/corretora/{id}','TipoSeguroController@porCorretora_index');

});