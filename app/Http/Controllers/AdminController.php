<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use app\User;
use App\Parts;
use App\ServiceOrder;
use App\CodigoServico;
use DB;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function admin()
    {
        return view('administrador/admin');
    }

    public function listarClientes()
    {

        $users = User::where('perfil','=','default')->orderBy('name', 'asc')->get();
        If ($users != null) {
            return view('/ordservico/clientes_ordemservico')->with(compact('users'));
        }   

        //Preciso ter pelo menos um cliente na base de dados ( criar validacao )

    }

    public function carregaCliente($id=null)
    {
        $pageWasRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) && $_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0';
        
        if($pageWasRefreshed ) {

        } else {
            $getCodeOS = CodigoServico::create();
        }

        $retorno = User::where('id','=',$id)->get();

        $retparts = Parts::all();
          

        return view('/ordservico/nova_ordemservico')->with(compact('retorno','retparts','getCodeOS'));
        //return redirect()->route('admin.cursos');
    }

    public function addParts(Request $req,$id=null,$codigoOS=null)
    {       

        $partsString = implode(",", $req->get('parts'));
        $separateParts = explode(',',$partsString);

        $status = ServiceOrder::create([
            'ordem_servicoID' => $codigoOS,
            'id_user' => $id,
            'id_parts' => $separateParts[0],
        ]);

        unset($separateParts[0]); //remove o item que já foi adicionado na tabela.

        If (count($separateParts) >= 1){

            $ultimaOrdem = ServiceOrder::orderby('created_at','DESC')->first();

            foreach ($separateParts as $part)
            {
                $status = ServiceOrder::create([
                    'ordem_servicoID' => $codigoOS,
                    'id_user' => $id,
                    'id_parts' => $part,
                ]);

                unset($separateParts[$part]);
            }

        }

        return redirect('/admin/ordemservico');
  
    }

    public function listarOrdensServico()
    {
        //SELECT *  FROM laravel_drag.service_orders group by ordem_servicoID;
        $ordserv = ServiceOrder::all()->groupby('ordem_servicoID');

        return view('/ordservico/ordemservico')->with(compact('ordserv'));
    }

    public function editarOrdemServico($id)
    {

        $editarOrdem = DB::table('service_orders')
                                ->where([
                                    ['service_orders.ordem_servicoID','=',$id]
                                ])   
                                ->join('users', 'users.id', '=', 'service_orders.id_user')
                                ->select('service_orders.ordem_servicoID', 'users.name' ,'users.email', 'service_orders.id_parts')
                                ->get();

        $retparts = Parts::all();

        return view('/ordservico/editar_ordemservico')->with(compact('editarOrdem','retparts'));

    }

    public function SalvareditarOrdemServico($id,Request $req)
    {

        $emailUsuario = $req->query();

        if($req->get('parts')!= NULL)
        {

            $partsString = implode(",", $req->get('parts'));
            $separateParts = explode(',',$partsString);

            $retornoID = User::where('email','=',$emailUsuario)
                        ->select('users.id')
                        ->get();

            ServiceOrder::where('ordem_servicoID',$id)->delete();

            $status = ServiceOrder::create([
                'ordem_servicoID' => $id,
                'id_user' => $retornoID[0]['id'],
                'id_parts' => $separateParts[0],
            ]);

            unset($separateParts[0]); //remove o item que já foi adicionado na tabela.

            If (count($separateParts) >= 1){

                $ultimaOrdem = ServiceOrder::orderby('created_at','DESC')->first();

                foreach ($separateParts as $part)
                {
                    $status = ServiceOrder::create([
                        'ordem_servicoID' => $id,
                        'id_user' => $retornoID[0]['id'],
                        'id_parts' => $part,
                    ]);

                    unset($separateParts[$part]);
                }

            }

        }

    return redirect('/admin/ordemservico');

    }

}
