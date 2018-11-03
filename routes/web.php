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

Route::get('/consultar/{id?}',['as'=>'consultar.ordem','uses'=>'LoginController@index'])->middleware('auth');


Route::group(['middleware' => 'is_admin'], function () {
    Route::get('/admin', 'AdminController@admin')->name('admin');

    Route::get('/admin/ordemservico','AdminController@listarOrdensServico')->name('listar.os');
    
   // Route::get('/admin/ordemservico',function() {
  //      return view('ordservico/ordemservico');
  //  })->name('admin');

    Route::get('/admin/ordemservico/nova/clientes','AdminController@listarClientes')->name('listar.clientes');
    Route::get('/admin/ordemservico/nova/{id?}','AdminController@carregaCliente')->name('gerar.ordemservico');
    Route::post('/admin/ordemservico/nova/{id}/adicionaitem/{codigo}','AdminController@addParts')->name('adiciona.item');

});
