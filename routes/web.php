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

Route::group(['middleware' => ['auth','is_default']], function () {
    Route::get('/',['as'=>'start',function () {
        return view('geral');
    }]);
    Route::get('/agendamento',['as'=>'agendamento', function() {
        return view('agendar');
    }]);
    Route::post('/agendamento/gravar',['as'=>'agendar', 'uses'=>'LoginController@SalvarData']);
    Route::get('/',['as'=>'start','uses'=>'LoginController@index']);
    Route::get('/consultar/{id?}',['as'=>'consultar.ordem','uses'=>'LoginController@index']); 
    Route::get('/agendamento/deletar/{id}',['as'=>'agendamento.deletar','uses'=>'LoginController@deletar']);
});

Auth::routes();

Route::get('/home', ['as'=>'create_user','uses'=>'HomeController@index']);

Route::group(['middleware' => 'is_admin'], function () {
    Route::get('/admin', 'AdminController@admin')->name('admin');
    Route::get('/admin/ordemservico','AdminController@listarOrdensServico')->name('listar.os');
    Route::get('/admin/ordemservico/editar/{idu}', 'AdminController@editarOrdemServico')->name('editar_ordemservico');
    Route::get('/admin/ordemservico/nova/clientes','AdminController@listarClientes')->name('listar.clientes');
    Route::get('/admin/ordemservico/nova/{id?}','AdminController@carregaCliente')->name('gerar.ordemservico');
    Route::post('/admin/ordemservico/nova/{id}/adicionaitem/{codigo}','AdminController@addParts')->name('adiciona.item');
    Route::post('/admin/ordemservico/editar/{idu}/salvar', 'AdminController@SalvareditarOrdemServico')->name('salvar_editar.ordemservico');
    Route::get('/admin/empresa','CompanyUser@returncompany')->name('salva.empresa');
});

Route::get('/admin/lercodigo', function() {
    return view('/administrador/codigo');
});

Route::get('/home/tabela',function(){
        return view('testedatatable');
});

Route::post('admin/empresa/create', 'CompanyUser@createcompany')->name('company.create');

Route::get('sendbasicemail','MailController@basic_email');
Route::get('sendhtmlemail','MailController@html_email');
