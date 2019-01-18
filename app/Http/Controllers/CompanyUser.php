<?php

namespace App\Http\Controllers;
use App\Company;
use App\User;

use Illuminate\Http\Request;

class CompanyUser extends Controller
{

    public function createcompany(Request $request)
    {
        //Cria as informações e atrelam a uma 'company' ou edita as informações
        //Resultado final é os valores salvos no MySql e redirecionamento de pagina para (/admin)
        $user = \Auth::user(); //recebe todos os dados da empresa 'logada'

        $data = $request->all();

        $existe_empresa = Company::where('id_user', auth()->user()->id)->first();

        if($existe_empresa == "")
        {
            $status = Company::create([
                'id_user' =>$user["id"],
                'nome_fantasia' => $data['nome_fantasia'],
                'cnpj' =>  $data['cnpj'],
                'cep' => $data['cep'],
                'telefone' => $data['telefone'],
                'email' =>$data['email'],
            ]);
    
            return redirect('/admin');            
        }
        else
        {
            $status_update = Company::where('id_user', auth()->user()->id)
                             ->update(['nome_fantasia'=> $data['nome_fantasia'],'cnpj' => $data['cnpj'], 'cep' => $data['cep'], 'telefone' => $data['telefone'], 'email' => $data['email']]);
        
            return redirect('/admin'); 
        }

    }

    public function returncompany(){

        $registro = Company::where('id_user', '=', auth()->user()->id)->get();

        if(empty($registro)){
            return view('administrador/empresa');
        }

        else 
        {
            $retorno_empresa = Company::where('cnpj','=',$registro[0]['cnpj'])->get();
            return view('administrador/empresa')->with(compact('retorno_empresa'));
        }


    }
}
