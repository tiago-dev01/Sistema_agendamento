@extends('site')

@section('conteudo')

<style type="text/css">
	
    #divCenter {
		margin-left:center;
		margin-top:100px;
	}

    #recebimento {
		margin-left:40px;
		margin-top:30px;
        width: auto;
	}


    .container {
         width: 400px;
         height: auto;
    }

    .saudacao{
        filter:alpha(opacity=20);
        opacity: 0.6;
        -moz-opacity:0.8;
        -webkit-opacity:1;
        margin-top:80px;
    }

    .parallax-container{
        filter:alpha(opacity=90);
        opacity: 0.9;
        -moz-opacity:0.9;
        -webkit-opacity:0.9;
        height: 300px;
    }

    #infos{
        margin-left:100px;
        margin-top:30px;
    }

    h4,h6 {
        color: white;
    }

    .scrollInfos{
        height:570px;
        width:400px;
        overflow:auto;
        background:#fff;
    }

    .ordemServico,.pos,.btn{
        margin-top:50px;
    }

    .header{
        background-color: #2980B9;
        color: Black;
    }

    .btn{
        width:200px;
    }


    table {
	background: #f5f5f5;
	border-collapse: separate;
	box-shadow: inset 0 1px 0 #fff;
	font-size: 16px;
	line-height: 24px;
    }	

    th {
        background:#89807F;
        border-left: 1px solid #555;
        border-right: 1px solid #777;
        border-top: 1px solid #555;
        border-bottom: 1px solid #333;
        box-shadow: inset 0 1px 0 #999;
        color: #fff;
        font-weight: bold;
        padding: 10px 15px;
        position: relative;
        text-shadow: 0 1px 0 #000;	
    }

    th:after {
        background: linear-gradient(rgba(255,255,255,0), rgba(255,255,255,.08));
        content: '';
        display: block;
        height: 25%;
        left: 0;
        margin: 1px 0 0 0;
        position: absolute;
        top: 25%;
        width: 100%;
    }

    th:first-child {
        border-left: 1px solid #777;	
        box-shadow: inset 1px 1px 0 #999;
    }

    th:last-child {
        box-shadow: inset -1px 1px 0 #999;
    }

    td {
        border-right: 1px solid #fff;
        border-left: 1px solid #e8e8e8;
        border-top: 1px solid #fff;
        border-bottom: 1px solid #e8e8e8;
        padding: 10px 15px;
        position: relative;
        transition: all 300ms;
    }

    td:first-child {
        box-shadow: inset 1px 0 0 #fff;
    }	

    td:last-child {
        border-right: 1px solid #e8e8e8;
        box-shadow: inset -1px 0 0 #fff;
    }	

    tr:nth-child(odd) td {
        background: #f1f1f1;	
    }

    tr:last-of-type td {
        box-shadow: inset 0 -1px 0 #fff; 
    }

    tr:last-of-type td:first-child {
        box-shadow: inset 1px -1px 0 #fff;
    }	

    tr:last-of-type td:last-child {
        box-shadow: inset -1px -1px 0 #fff;
    }	

    tbody:hover td {
        color: transparent;
        text-shadow: 0 0 3px #aaa;
    }

    tbody:hover tr:hover td {
        color: #444;
        text-shadow: 0 1px 0 #fff;
    }

    .swal-overlay {
        background-color: rgba(255,255,255,0.8);
    }

</style>

<div class="parallax-container">

    <div class="saudacao">
        <p><h4 id="recebimento">Olá {{ Auth::user()->name }},</h4></p>
        <p><h6 id="infos">Aqui você pode consultar, todos os seus agendamentos que estão em aberto e algumas informações a mais!</h6></p>
    </div>

    <div class="parallax"><img src="{{  asset('storage/car-breakdown.jpg') }}"></div>

</div>

  <div class="row">
    <div class="col s12">
      <ul class="tabs">
        <li class="tab col s4"><a href="#1">Agendamentos</a></li>
        <li class="tab col s4"><a class="active" href="#2">Ordem de Serviço</a></li>
        <li class="tab col s4"><a href="#3">Nota Fiscal dos Serviços</a></li>
      </ul>
    </div>

    <div id="1" class="col s12">

        <div class="row">
        
            <div class="col s8 offset-s2">  
            
                <ul class="collection with-header pos">
                    <li class="collection-header center header">
                        <h5>Seus agendamentos estão disponíveis para consulta, logo abaixo: <td><a href="{{route('agendamento')}}" class="secondary-content center"><i class="material-icons">add_circle_outline</i></a></td></h5>              
                    </li>


                    <table>
                            <thead>
                            <tr>
                                <th>Código Agendamento</th>
                                <th>Data Agendada</th>
                                <th>Horário Agendado</th>
                                <th>Ações</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($registros as $registro)
                            <tr>
                                <td> {{ $registro['id'] }}</td>
                                <td><p><i class="material-icons">date_range</i>     {{ $registro['date'] }}</p></td>
                                <td><p><i class="material-icons">alarm_on</i>     {{ $registro['time'] }}</p></td>                           
                                <td><a class="deletarAgendamento" href="{{ route('agendamento.deletar',$registro->id) }}" class="secondary-content left"><i class="material-icons">delete</i></a></td>
                            </tr>
                            @endforeach
                            </tbody>
                    </table>
                
                </ul>
            </div>

        </div>  

    </div>


    <div id="2" class="col s12">
        
        <li class="collection-header center">
                <h5>Selecione uma ordem de serviço, para poder visualizar os detalhes logo abaixo: </h5>
        </li>


        <!-- Dropdown Trigger -->
        <div class='center'> 
            <a class='dropdown-trgg btn' href='#' data-target='dropdown2'>Selecione</a>
        </div>
        <!-- Dropdown Structure -->
        <ul id='dropdown2' class='dropdown-content'>
        @foreach($qtos as $key => $qtreg)
            <li><a href="{{ route('consultar.ordem',$qtreg->ordem_servicoID) }}"><i class="material-icons">content_paste</i>Ordem_Serv: {{$qtreg->ordem_servicoID}}</a></li>
        @endforeach
        </ul>

    <div class="row">
        
        <div class="col s8 offset-s2">  

            <ul class="collapsible ordemServico">
                <li>
                <div class="collapsible-header"><i class="material-icons">traffic</i>Ordem de Serviço</div>
                <div class="collapsible-body">
                <span>
                
                    <table class="highlight">
                        <thead>
                        <tr>
                            <th>Código OS</th>
                            <th>Nome do Item</th>
                            <th>Preço por Item</th>
                        </tr>
                        </thead>

                        <tbody>

                            <li class="collection-header right">
                                <h5>Última atualização: {{$lastupdate}}</h5>
                            </li>

                            @foreach($cos as $key => $data)

                                <tr>
                                    <td>{{ $data->ordem_servicoID }}</td>
                                    <td>{{ $data->part_name }}</td>
                                    <td>{{ $data->price }}</td>
                                </tr>

                            @endforeach
                        </tbody>
                    </table>

                    <p></p>

                
                </span> </div>
                </li>

            </ul>

        </div>
    
    </div>
        
</div>


    <div id="3" class="col s12">
        
    </div>


  </div>

<div class= "row"> 
    <div class="col s4">
</div> 


@endsection
    
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script>
       
       $(document).ready(function(){
            $('.collapsible').collapsible();
        });

        $(document).ready(function(){
             $('.dropdown-trgg').dropdown();
        });

        $(document).ready(function(){
             $('.tabs').tabs();
        });

        $(document).ready(function(){
            $('.parallax').parallax();
        });

    </script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>

        $(document).ready(function(){
            $('.deletarAgendamento').on('click', function(e){
                
                e.preventDefault(); //cancel default action            
                var href = $(this).attr('href');

                //pop up
                swal({
                    title: "Deletar agendamento",
                    text: "Deseja realmente deletar o agendamento ?", 
                    icon: "info",
                    buttons: ["Não", "Sim"],
                    dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                    swal("Registro apagado com sucesso!!", {
                        icon: "success",
                        buttons: false
                    });  
                    setTimeout(function(){
                        window.location.href = href;
                    }, 2000);                                   
                } 
                });
            });
        });

    </script>
