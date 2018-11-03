@extends('site')

@section('conteudo') 

<style type="text/css">

    th,td {
        padding: 3px;
        text-align: bottom;
    }

    #tbody {
        overflow: auto;
    }


</style>

    <div class="row" style="height:100px">
    </div>
        
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

            <ul class="collection with-header">
                <li class="collection-header"><h4>Clientes Cadastrados </h4></li>
                <table class="highlight" id="tbody">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nome</th>
                        <th>E-Mail</th>
                        <th>Ações</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td> {{ $user['id'] }}</td>
                        <td><p><i class="material-icons">person</i>     {{ $user['name'] }}</p></td>
                        <td><p><i class="material-icons">email</i>     {{ $user['email'] }}</p></td>                                       
                        <td><a id="myCheck" onclick="alert('click event occured')" href="{{ route('gerar.ordemservico',$user->id) }}" class="secondary-content left"><i class="material-icons">send</i></a></td>
                    </tr>
                    @endforeach
                    </tbody>

                </table>
            </ul>


            </div>
        </div>
    </div>

@endsection