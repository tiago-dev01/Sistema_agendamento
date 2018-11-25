@extends('site')

@section('conteudo')

<style type="text/css">
    .classalter{
        border: 2px solid red;
        border-radius: 5px;
    }
</style>

    <div class="row" style="height:100px">
    </div>

    
    <div class="row">
        <div class="col s8 offset-s2">
        <ul class="collection with-header z-depth-4">
            <li class="collection-header">
                
                <div class="row">

                    <div class="col s8 m6 l6 ">
                        <h5 class="center">Pesquisar ordens de serviço</h5>
                        <nav>
                            <div class="nav-wrapper">
                            <form>
                                <div class="input-field">
                                <input id="search" onkeyup="filterOrdensServico()" type="search" required>
                                <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                                <i class="material-icons">close</i>
                                </div>
                            </form>
                            </div>
                        </nav>   
                    </div>

                    <div class="col s4 m4 l4 right">

                        <a href="{{route('listar.clientes')}}" class="secondary-content"><i class="medium material-icons right">add</i></a>

                    </div>

                </div>

                    <p> Caso desejar atualizar alguma Ordem de Serviço, clicar no icone na frente do código correspondente a Ordem de Serviço. </p>

            </li> 

            <ul id="ulos" style="overflow:auto;">
                @foreach($ordserv as $os)
                    <li class="collection-item" id="lios"><div>{{$os[0]->ordem_servicoID}}<a href="{{route('editar_ordemservico',['id'=>$os[0]->ordem_servicoID])}}" class="secondary-content"><i class="material-icons">cached</i></a></div></li>
                @endforeach
            </ul>

        </ul>
        </div>
    </div>


@endsection

<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

<script>
    function filterOrdensServico() {
        // Declare variables
        var input, filter, ul, li, a, i;
        input = document.getElementById('search');
        filter = input.value.toUpperCase();
        ul = document.getElementById("ulos");
        li = ul.getElementsByTagName('li');

        // Loop through all list items, and hide those who don't match the search query
        for (i = 0; i < li.length; i++) {
            a = li[i].getElementsByTagName("div")[0];
            if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
                li[i].style.display = "";
            } else {
                li[i].style.display = "none";
            }
        }
    }
</script>