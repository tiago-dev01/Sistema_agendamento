@extends('site')

@section('conteudo')

<style type="text/css">
    .classalter{
        border: 2px solid red;
        border-radius: 5px;
    }

    th,td {
        padding: 3px;
        text-align: bottom;
    }

</style>

    <div class="row" style="height:100px">
    </div>

    <div class="row">
        <div class="col s8 offset-s2 z-depth-4">
            <ul class="collection with-header">
                
                <li class="collection-header">
                    
                    <h5 class="">Ordem de Serviço</h5>
                    <p></p>
                    <div class="divider"></div>

                    <div class="row">
                    <p></p>

                        <div class="col s8">
                            <table class="highlight">
                                <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>E-Mail</th>
                                </tr>
                                </thead>

                                <tbody>

                                <tr>
                                @foreach($retorno as $ret)
                                    <td>{{ $ret['name'] }}</td>
                                    <td>{{ $ret['email'] }}</td>
                                @endforeach
                                </tr>

                                </tbody>
                            </table>  

                        </div>
                    </div>
                </li>

                <div>

                <form action="{{route('adiciona.item',['id'=>$ret->id,'codigo'=>$getCodeOS->uuid])}}" method="post" id="form1" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div style="height:10px"></div>
                    <div class="col s12" style="height:400px;overflow:auto;">
                        <table id="table_id" class="highlight">
                            <thead>
                            <tr>
                                    <th>Código</th>
                                    <th>Nome da Peça</th>
                                    <th>Preço</th>
                                    <th>Ações</th>
                            </tr>
                            </thead>

                            <tbody>
                                @foreach($retparts as $part)                        
                                    <tr>
                                        <td>
                                            <label>
                                                <input type="checkbox" name="parts[]" value="{{$part->id}}"/>
                                                <span>{{$part['id']}}</span>
                                            </label>
                                        </td>

                                        <td>{{$part['part_name']}}</td>
                                        <td>{{$part['price']}}</td>
                                        <td>teste</td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="row"></div>
                    </div>
                        <div class="row"></div>
                        <div style="height:20px"></div>
                        <div class="row center offset s2">
                            <button class="btn waves-effect waves-light" type="submit" form="form1" name="action">Salvar
                                <i class="material-icons right">save</i>
                            </button>
                        </div>

                    
                </form>
                 
                </div>

            </ul>
        </div>
    </div>


@endsection

<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    
    <script>
       
        $(document).on('change', '#alluser', function(e) {
            var retorno = this.options[e.target.selectedIndex].text;        
            $('span').text(retorno);
        });

        $(document).ready(function(){
            $('.modal').modal();
        });

    </script>

