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

Route::get('/',['as'=>'start',function () {
    return view('geral');
}])->middleware('auth');;

Auth::routes();

Route::get('/home', ['as'=>'create_user','uses'=>'HomeController@index']);

Route::get('/agendamento/deletar/{id}',['as'=>'agendamento.deletar','uses'=>'LoginController@deletar']);



Route::get('/agendamento',['as'=>'agendamento', function() {
    return view('agendar');
}])->middleware('auth');

Route::post('/agendamento/gravar',['as'=>'agendar', 'uses'=>'LoginController@SalvarData'])->middleware('auth');

Route::get('/',['as'=>'start','uses'=>'LoginController@index'])->middleware('auth');
Route::get('/',['as'=>'start','uses'=>'LoginController@index'])->middleware('auth');

Route::get('/consultar/{id?}',['as'=>'consultar.ordem','uses'=>'LoginController@index'])->middleware('auth');

