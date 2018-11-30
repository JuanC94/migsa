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

Route::prefix('reportes')->group(function () {
    Route::get('/', [
        'as'   => 'reportes',
        'uses' => 'ReportesController@index'
    ]);
    Route::post('/store', [
        'as'   => 'storeReporte',
        'uses' => 'ReportesController@store'
    ]);
    Route::get('/{user}/{numero}/', [
        'as'   => 'reporteempresa',
        'uses' => 'ReportesController@show'
    ]);
});

Route::prefix('pais')->group(function () {
    Route::get('/', [
        'as'   => 'indexPais',
        'uses' => 'PaisController@index'
    ]);
    Route::get('/create', [
        'as'   => 'createPais',
        'uses' => 'PaisController@create'
    ]);
    Route::post('/store', [
        'as'   => 'storePais',
        'uses' => 'PaisController@store'
    ]);
    Route::get('/{id}/edit', [
        'as'   => 'editPais',
        'uses' => 'PaisController@edit'
    ]);
    Route::post('/{id}/update', [
        'as'   => 'updatePais',
        'uses' => 'PaisController@update'
    ]);
});

Route::prefix('sector')->group(function () {
    Route::get('/', [
        'as'   => 'indexSector',
        'uses' => 'SectorController@index'
    ]);
    Route::get('/create', [
        'as'   => 'createSector',
        'uses' => 'SectorController@create'
    ]);
    Route::post('/store', [
        'as'   => 'storeSector',
        'uses' => 'SectorController@store'
    ]);
    Route::get('/{id}/edit', [
        'as'   => 'editSector',
        'uses' => 'SectorController@edit'
    ]);
    Route::post('/{id}/update', [
        'as'   => 'updateSector',
        'uses' => 'SectorController@update'
    ]);
});