<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Agendar;
use App\ServiceOrder;
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

    public function index($id = null)
    {
            $registros = Agendar::where('id_user', '=', auth()->user()->id)->get();
            //dd($registros);         
            foreach ($registros as $registro){
                if ($registro['date'] < date('Y-m-d')){
                    Agendar::find($registro['id'])->delete();
                }
            }
        
            $qtos = DB::table('service_orders')
                    ->where('service_orders.id_user', '=', auth()->user()->id)   
                    ->distinct('service_orders.ordem_servicoID')
                    ->select('service_orders.ordem_servicoID')->get();
                    //->count('service_orders.ordem_servico');

            $cos = DB::table('service_orders')
                ->where([
                    ['service_orders.id_user', '=', auth()->user()->id],
                    ['service_orders.ordem_servicoID','=',$id]
                ])   
                ->join('users', 'users.id', '=', 'service_orders.id_user')
                ->join('parts', 'parts.id', '=', 'service_orders.id_parts')
                ->select('service_orders.id', 'service_orders.ordem_servicoID' ,'parts.part_name', 'parts.price', 'service_orders.updated_at')
                ->get();
            

            $lastupdate = DB::table('service_orders')
                            ->where('service_orders.ordem_servicoID','=',$id)
                            ->max('updated_at');

         
            return view('geral')->with(compact('registros','qtos','cos','lastupdate'));
                                
    }


    public function deletar($id)
    {
        Agendar::find($id)->delete();
        return redirect('/');
    }

}
