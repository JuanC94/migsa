<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('paginas')->group(function () {
    Route::get('/', [
        'as'   => 'indexPagina',
        'uses' => 'PaginaController@index'
    ]);
    Route::get('/create', [
        'as'   => 'createPagina',
        'uses' => 'PaginaController@create'
    ]);
    Route::post('/store', [
        'as'   => 'storePagina',
        'uses' => 'PaginaController@store'
    ]);
    Route::get('/{id}/edit', [
        'as'   => 'editPagina',
        'uses' => 'PaginaController@edit'
    ]);
    Route::post('/{id}/update', [
        'as'   => 'updatePagina',
        'uses' => 'PaginaController@update'
    ]);
});

Route::prefix('indicadores')->group(function () {
    Route::get('/', [
        'as'   => 'indexIndicador',
        'uses' => 'IndicadorController@index'
    ]);
    Route::get('/create', [
        'as'   => 'createIndicador',
        'uses' => 'IndicadorController@create'
    ]);
    Route::post('/store', [
        'as'   => 'storeIndicador',
        'uses' => 'IndicadorController@store'
    ]);
    Route::get('/{id}/edit', [
        'as'   => 'editIndicador',
        'uses' => 'IndicadorController@edit'
    ]);
    Route::post('/{id}/update', [
        'as'   => 'updateIndicador',
        'uses' => 'IndicadorController@update'
    ]);
});

Route::prefix('indices')->group(function () {
    Route::get('/', [
        'as'   => 'indexIndice',
        'uses' => 'IndiceController@index'
    ]);
    Route::get('/create', [
        'as'   => 'createIndice',
        'uses' => 'IndiceController@create'
    ]);
    Route::post('/store', [
        'as'   => 'storeIndice',
        'uses' => 'IndiceController@store'
    ]);
    Route::get('/{id}/edit', [
        'as'   => 'editIndice',
        'uses' => 'IndiceController@edit'
    ]);
    Route::post('/{id}/update', [
        'as'   => 'updateIndice',
        'uses' => 'IndiceController@update'
    ]);
});

Route::prefix('respuestas')->group(function () {
    Route::get('/{pagina_id}', [
        'as'   => 'responderPreguntas',
        'uses' => 'RespuestaController@responder_preguntas'
    ]);
    Route::post('/store', [
        'as'   => 'storeRespuesta',
        'uses' => 'RespuestaController@store'
    ]);
});