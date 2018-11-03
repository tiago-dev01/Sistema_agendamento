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
        <ul class="collection with-header">
            <li class="collection-header">
                
                <div class="row">

                    <div class="col s8 m6 l6">
                        <h5 class="center">Pesquisar ordens de serviço</h5>
                        <nav>
                            <div class="nav-wrapper">
                            <form>
                                <div class="input-field">
                                <input id="search" type="search" required>
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

            </li>
            @foreach($ordserv as $os)
                <li class="collection-item"><div>{{$os[0]->ordem_servicoID}}<a href="#!" class="secondary-content"><i class="material-icons">send</i></a></div></li>
            @endforeach
        </ul>
        </div>
    </div>


@endsection