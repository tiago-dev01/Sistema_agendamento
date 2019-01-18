@extends('site')

@section('conteudo')

<style type="text/css">
    .centerForm{
        position: absolute;
        left: 30%;
        top: 20%;
        width: 100%;
    }
    .centerTop{
        position: absolute;
        left: 26%;
        top: 7%;
        width: 100%; 
    }
    h1 { font-family: Aclonica, Arial, sans-serif; }
</style>


<div class="centerForm row">
    <form class="centerForm col s12 m5" action="{{ action('CompanyUser@createcompany') }}" method="post" enctype="multipart/form-data">
      {{ csrf_field() }}  
      <div class="card-panel white">
        <div class="row">
          <div class="input-field col s12">
            <input id="nome_fantasia" name="nome_fantasia" type="text" value="{{$retorno_empresa[0]['nome_fantasia'] or ''}}" class="" autocomplete="off">
            <label for="nome_fantasia">Nome Fantasia</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s6">
            <input class="cnpj"  name="cnpj" id="cnpj" type="text" value="{{$retorno_empresa[0]['cnpj'] or ''}}" autocomplete="off">
            <label for="cnpj">CNPJ</label>
          </div>
          <div class="input-field col s6">
            <input class="cep" id="cep" name="cep" type="text" value="{{$retorno_empresa[0]['cep'] or ''}}" class="validate" autocomplete="off">
            <label for="cep">CEP</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <input class="phone_with_ddd" id="telefone" name="telefone" type="text" value="{{$retorno_empresa[0]['telefone'] or ''}}" class="validate" autocomplete="off">
            <label for="telefone">Telefone</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <input id="email" name="email" type="email" value="{{$retorno_empresa[0]['email'] or ''}}" class="validate" autocomplete="off">
            <label for="email">Email</label>
          </div>
          <div style="height:100px"></div> 
          <button class="btn waves-effect waves-light right" id="btn-submit" >SALVAR
              <i class="material-icons right">send</i>
          </button>
        </div>
      </div>
    </form>
  </div>
@endsection

<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>

$(document).ready(function(){
    $('#btn-submit').on('click', function(e){
        
        e.preventDefault(); //cancel default action            
        var form = $(this).parents('form');

        //pop up
        swal({
            title: "Informações Gerais",
            text: "Deseja salvar as informações sobre sua empresa ??", 
            icon: "info",
            buttons: ["Não", "Sim"],
            dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            swal("Informações salvas com sucesso!!", {
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

$(document).ready(function($){
  $('.cnpj').mask('00.000.000/0000-00', {reverse: true});
  $('.cep').mask('00000-000');
  $('.phone_with_ddd').mask('(00) 0000-0000');
});

</script>

