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

    .ordemServico{
        margin-top:50px;
    }

    .btn{
        margin-left:750px;        
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
        <li class="tab col s4"><a class="active" href="#test1">Agendamentos</a></li>
        <li class="tab col s4"><a href="#test2">Ordem de Serviço</a></li>
        <li class="tab col s4"><a href="#test3">Nota Fiscal dos Serviços</a></li>
      </ul>
    </div>

    <div id="test1" class="col s12">

        <div class="container" id="divCenter">

<div class="scrollInfos">   

    @foreach($registros as $registro)
    <ul class="collapsible">

        <li>
            <div class="collapsible-header">
            <p><i class="material-icons">event</i>Informações</p>  

                @if ($registro['created_at']->format('Y-m-d') === date('Y-m-d'))
                    <span class="new badge" data-badge-caption="New"></span></div>
                        <div class="collapsible-body">     
                            <p><i class="material-icons">date_range</i>    Data Agendada: {{ $registro['date'] }}</p>           
                            <p><i class="material-icons">alarm_on</i>    Horário Agendado: {{ $registro['time'] }}</p>
                        </div>
                    </li>
                </ul>

                @else
                    <span class="" data-badge-caption=""></span></div>
                        <div class="collapsible-body">     
                            <p><i class="material-icons">date_range</i>    Data Agendada: {{ $registro['date'] }}</p>           
                            <p><i class="material-icons">alarm_on</i>    Horário Agendado: {{ $registro['time'] }}</p>
                        </div>
            
                    </li>
                </ul> 
                 @endif
    @endforeach

    </div>
</div>
        
    </div>


    <div id="test2" class="col s12">


        <ul class="collapsible ordemServico">
            <li>
            <div class="collapsible-header"><i class="material-icons">traffic</i>Ordem de Serviço</div>
            <div class="collapsible-body">
            <span>
            
                <table class="highlight">
                    <thead>
                    <tr>
                        <th>Nome do Item</th>
                        <th>Quantidade</th>
                        <th>Preço por Item</th>
                    </tr>
                    </thead>

                    <tbody>
                    <tr>
                        <td>Jogo de velas NGK</td>
                        <td>4</td>
                        <td>R$87,5</td>
                    </tr>
                    <tr>
                        <td>Limpeza de bicos</td>
                        <td>1</td>
                        <td>R$100,00</td>
                    </tr>
                    <tr>
                        <td>Bomba de gasolina</td>
                        <td>1</td>
                        <td>R$218.00</td>
                    </tr>
                    </tbody>
                </table>

                <p></p>

                <!-- Dropdown Trigger -->
                <a class='dropdown-trigger btn' href='#' data-target='dropdown1'>Opções</a>

                <!-- Dropdown Structure -->
                <ul id='dropdown1' class='dropdown-content'>
                    <li><a href="#!"><i class="material-icons">view_module</i>Gerar PDF</a></li>
                    <li><a href="#!"><i class="material-icons">cloud</i>Pagamento</a></li>
                </ul>
            
            </span> </div>
            </li>

            <li>
            <div class="collapsible-header"><i class="material-icons">place</i>Second</div>
            <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
            </li>
            <li>
            <div class="collapsible-header"><i class="material-icons">whatshot</i>Third</div>
            <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
            </li>
        </ul>


    </div>


    <div id="test3" class="col s12">

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
             $('.dropdown-trigger').dropdown();
        });

        $(document).ready(function(){
             $('.tabs').tabs();
        });

        $(document).ready(function(){
            $('.parallax').parallax();
        });

    </script>

    <script>
        function myFunction() {
            document.getElementById("btn1").innerHTML = "Hello World";
        }
    </script>

