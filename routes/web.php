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
    return view('index');
});


Route::get('/cliente', 'ClienteCtrl@index');
Route::get('/cliente/novo', 'ClienteCtrl@create');
Route::post('/cliente/save', 'ClienteCtrl@store');
Route::get('/cliente/apagar/{id}', 'ClienteCtrl@destroy');
Route::get('/cliente/editar/{id}', 'ClienteCtrl@edit');
Route::post('/cliente/{id}', 'ClienteCtrl@update');
Route::get('/passagem', 'PassagemCtrl@indexView');
Route::get('/passagem/novo', 'PassagemCtrl@create');
Route::post('/passagem', 'PassagemCtrl@store');
Route::get('/passagem/apagar/{id}', 'PassagemCtrl@destroy');
Route::get('/passagem/editar/{id}', 'PassagemCtrl@edit');
Route::post('/passagem/{id}', 'PassagemCtrl@update');
Route::get('/servico', 'ServicoCtrl@index');
Route::get('/servico/novo', 'ServicoCtrl@create');
Route::post('/servico/save', 'ServicoCtrl@store');
Route::get('/servico/apagar/{id}', 'ServicoCtrl@destroy');
Route::get('/servico/editar/{id}', 'ServicoCtrl@edit');
Route::post('/servico/{id}', 'ServicoCtrl@update');
Route::get('/voo', 'VooCtrl@index');
Route::get('/voo/novo', 'VooCtrl@create');
Route::post('/voo/save', 'VooCtrl@store');
Route::get('/voo/apagar/{id}', 'VooCtrl@destroy');
Route::get('/voo/editar/{id}', 'VooCtrl@edit');
Route::post('/voo/{id}', 'VooCtrl@update');


