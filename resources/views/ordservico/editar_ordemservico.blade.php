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

    .div {
        border: 2px dotted #999; /*Definindo o estilo da borda*/
    }    

    .swal-overlay {
        background-color: rgba(255,255,255,0.8);
    }

</style>

    <div class="row" style="height:40px">
    </div>

     <input id="CheckedParts" type="hidden" value="{{ $editarOrdem->toJson() }}">

    <div class="row">
        <div class="col s8 offset-s2 z-depth-4">
            <ul class="collection with-header ">
            
                <div class="right">
                    {!! QRCode::text($editarOrdem[0]->ordem_servicoID)->svg(); !!}
                </div>
                
                <li class="collection-header">
                  
                    <h5 class="">Ordem de Serviço (Atualização)</h5>
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

                                    <td>{{ $editarOrdem[0]->name }}</td>
                                    <td>{{ $editarOrdem[0]->email }}</td>

                                </tr>

                                </tbody>
                            </table>  
                        </div>

                        <div class="col s4">

                        </div>

                    </div>
                </li>

                <div>

                <form action="{{route('salvar_editar.ordemservico',['id'=>$editarOrdem[0]->ordem_servicoID,'email'=>$editarOrdem[0]->email])}}" method="post" id="form1" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div style="height:10px"></div>   
                    <div class="col s12" style="height:400px;overflow:auto;">
                        <table id="table_id" class="display" >

                            <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Nome da Peça</th>
                                    <th>Preço</th>
                                    <th>Status</th>
                                </tr>
                            </thead>

                            
                            <tbody>
                                @foreach($retparts as $part)                        
                                    <tr>
                                        <td>
                                            <label>
                                                <input id="cbParts" type="checkbox" name="parts[]" value="{{$part->id}}"/>
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

                        <div class="row">

                            <div class="col s4 center">
                                <button href="{{ URL::previous() }}" class="btn waves-effect waves-light">Voltar
                                    <i class="material-icons right">arrow_back</i>
                                </button>
                            </div>

                            <div class="col s3 right">
                                <button id="btn-submit" class="btn waves-effect waves-light salvarordem" type="submit" form="form1" name="action">Salvar
                                    <i class="material-icons right">save</i>
                                </button>
                            </div>

                        </div>
                    
                </form>
                 
                </div>

            </ul>          

        </div>

    </div>


@endsection

<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

    <script>
       
        $(document).on('change', '#alluser', function(e) {
            var retorno = this.options[e.target.selectedIndex].text;        
            $('span').text(retorno);
        });

        $(document).ready(function(){
            $('.modal').modal();
        });
        
        $(document).ready(function(){
            $('#CheckedParts').each(function(){
                
                var obj = JSON.parse($(this).val());
                var countObject = Object.keys(obj).length;

                //console.log(obj[0].id_parts);
                
                for(i=0;i<countObject;i++){
                    //console.log(obj[i].id_parts);
                    var sList = "";
                    $('input[type=checkbox]').each(function () {
                        var sThisVal = (this.value);
                        if (obj[i].id_parts == sThisVal){
                            //console.log(sThisVal);
                            $(this).attr("checked","checked");
                        }
                        //sList += (sList=="" ? sThisVal : "," + sThisVal);
                    });
                    //console.log (sList);
                }
            });
        });

    </script>

         <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      
      <script>

        $(document).ready(function(){
            $('#btn-submit').on('click', function(e){
                
                e.preventDefault(); //cancel default action            
                var form = $(this).parents('form');

                //pop up
                swal({
                    title: "Ordem de Serviço",
                    text: "Deseja salvar as alterações nessa O.S ??", 
                    icon: "info",
                    buttons: ["Não", "Sim"],
                    dangerMode: true,
                })
                .then((willDelete) => {
                  if (willDelete) {
                    swal("Alterações realizadas com sucesso!!", {
                      icon: "success",
                      buttons: false
                    });  
                    setTimeout(function(){
                      form.submit();
                    }, 2000);                                   
                  } 
                });
            });
        });

      </script>
   
