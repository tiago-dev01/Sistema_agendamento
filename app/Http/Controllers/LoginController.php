<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Agendar;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{

    public function SalvarData(Request $req){

        $data = $req->all();

       $newDate = date("Y-m-d", strtotime($data['date']));
       $data['date'] =  $newDate;

       $newTime = date("H:i", strtotime($data['time']));
       $data['time'] = $newTime;

        $data['id_user'] = auth()->user()->id;   
        
       // dd($data); 

        if ($data['date'] > date('Y-m-d')){
            Agendar::create($data);
        }

        return redirect('/');

    }

    public function index()
    {
            $registros = Agendar::where('id_user', '=', auth()->user()->id)->get();
            //dd($registros);         
            foreach ($registros as $registro){
                if ($registro['date'] < date('Y-m-d')){
                    Agendar::find($registro['id'])->delete();
                }
            }

            return view('geral',compact('registros'));
    }

}
