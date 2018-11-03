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
            <div class="col s12 m4 l4">
                
                <div class="card horizontal">
                <div class="card-stacked">
                    <div class="card-content">
                        <i class="material-icons">event_note</i>
                        <p>Consulte os agendamentos, realizados através do sistema e outros detalhes adicionais.</p>
                        <div class="row"></div>
                        <span class="new badge blue" data-badge-caption="">4</span>
                    </div>
                    <div class="card-action">
                        <a class="right" href="#">Consulte a lista de agendamentos</a>
                    </div>
                </div>
                </div>

            </div>
            <div class="col s12 m4 l4">

                <div class="card horizontal">
                <div class="card-stacked">
                    <div class="card-content">
                        <i class="material-icons">tune</i>
                        <p>Acesse ordens de serviço, de todos os clientes e também manipule seus arquivos, acrescentando informações a O.S</p>
                        <div class="row"></div>
                    </div>
                    <div class="card-action">
                        <a class="right" href="/admin/ordemservico">Consulte Ordens Serviço</a>
                    </div>
                </div>
                </div>
            
            </div>
            <div class="col s12 m4 l4">

                <div class="card horizontal">
                <div class="card-stacked">
                    <div class="card-content">
                        <i class="material-icons">list</i>
                        <p>EM DESENVOLVIMENTO</p>
                        <div class="row"></div>
                    </div>
                    <div class="card-action">
                        <a class="right" href="#">Em desenvolvimento</a>
                    </div>
                </div>
                </div>
            
            </div>
        </div>

@endsection