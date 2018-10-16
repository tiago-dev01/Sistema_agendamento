@extends('site')

@section('conteudo')

<style type="text/css">

    .col {
		margin-top:50px;
        width: auto;
	}

    #infos{
        margin-top:50px;
    }

</style>

    <div class="row">
        <p><h2 class="center" id="infos">DashBoard</h2></p>
    </div>

    <div class="row">

        <div class="col s1">
        </div>

        <div class="col s3">
                <h5 class="header">Agendamentos</h5>
                <div class="card horizontal">
                <div class="card-stacked">
                    <div class="card-content">
                    <p>I am a very simple card. I am good at containing small bits of information.</p>
                    </div>
                    <div class="card-action">
                    <a href="#">This is a link</a>
                    </div>
                </div>
                </div>
        </div>

        <div class="col s3">
                <h5 class="header">Ordens de Serviço</h5>
                <div class="card horizontal">
                <div class="card-stacked">
                    <div class="card-content">
                    <p>I am a very simple card. I am good at containing small bits of information.</p>
                    </div>
                    <div class="card-action">
                    <a href="#">This is a link</a>
                    </div>
                </div>
                </div>
        </div>
          
        <div class="col s3">
                <h5 class="header">Atualizações</h5>
                <div class="card horizontal">
                <div class="card-stacked">
                    <div class="card-content">
                    <p>I am a very simple card. I am good at containing small bits of information.</p>
                    </div>
                    <div class="card-action">
                    <a href="#">This is a link</a>
                    </div>
                </div>
                </div>
        </div>

        <div class="col s1">
        </div>


  


@endsection