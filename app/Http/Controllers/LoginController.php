<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Agendar;
use Illuminate\Support\Facades\Auth;

use DB;


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

            $regs = DB::table('service_orders')
                    ->where('service_orders.id_user', '=', auth()->user()->id)   
                    ->join('users', 'users.id', '=', 'service_orders.id_user')
                    ->join('parts', 'parts.id', '=', 'service_orders.id_parts')
                    ->select('service_orders.id', 'service_orders.ordem_servico' ,'parts.part_name', 'parts.price')
                    ->get();


            return view('geral', ['regs' => $regs])->with(compact('registros'));
                                

    }

    public function deletar($id)
    {
        Agendar::find($id)->delete();
        return redirect('/');
    }

}
