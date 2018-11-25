@extends('site')

@section('conteudo') 


<style type="text/css">

    .testId {
        padding: 3px;
        text-align: center;
    }

    tbody {
        overflow: auto;
    }

    .classalter{
        border: 2px solid red;
        border-radius: 5px;
    }

</style>

    <div class="row" style="height:100px">
    </div>

    
    <div class="container col s12 m4 l8 z-depth-4">   

        <ul class="collection with-header">
            <li class="collection-header">
                <h4>Clientes Cadastrados </h4>
                <p>Selecione um usuário, para poder prosseguir com a criação da ordem de serviço.</p>
            </li>

                <div class="col s12">
                <table class="highlight">
                        <thead>
                            <tr>
                                <th class="testId">Id</th>
                                <th class="test">Nome</th>
                                <th class="test">E-Mail</th>
                                <th class="test">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td class="testId"> {{ $user['id'] }}</td>
                                    <td><p><i class="material-icons">person</i>     {{ $user['name'] }}</p></td>
                                    <td><p><i class="material-icons">email</i>    {{ $user['email'] }}</p></td>                                       
                                    <td><a id="myCheck" onclick="alert('click event occured')" href="{{ route('gerar.ordemservico',$user->id) }}" class="secondary-content left"><i class="material-icons">send</i></a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </ul>
        </div>

@endsection


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script>


</script>
