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
Route::get('/pages', 'PageController@index');
Route::get('/pages/create', 'PageController@create');
Route::post('/pages/store', [
    'as'   => 'createPage',
    'uses' => 'PageController@store'
]);
Route::get('/pages/{id}/view', [
    'as'   => 'ViewPage',
    'uses' => 'PageController@view'
]);