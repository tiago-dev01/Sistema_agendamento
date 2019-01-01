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

<!-- Modal Trigger -->
  <a class="waves-effect waves-light modal-trigger" href="#modal1">Busque pelo código</a>

<!-- Modal Structure -->
<div id="modal1" class="modal">
  <div class="modal-content">
    <h4>Modal Header</h4>
    <div class="center">
        <canvas></canvas>
        </div>  

        <select></select>

        <ul></ul>
        <a class="waves-effect waves-light btn" id="target"><i class="material-icons left">cloud</i>Parar</a>
        <a class="waves-effect waves-light btn" id="play"><i class="material-icons left">cloud</i>Play</a>
        <script type="text/javascript" charset="utf-8" src="{{ asset('js/qrcodelib.js') }}"></script>
        <script type="text/javascript" charset="utf-8" src="{{ asset('js/webcodecamjs.js') }}"></script>
        <script type="text/javascript">
        	
            var txt = "innerText" in HTMLElement.prototype ? "innerText" : "textContent";
            var arg = {
                resultFunction: function(result) {
                	var aChild = document.createElement('li');
                	aChild[txt] = result.format + ': ' + result.code;
                    document.querySelector('body').appendChild(aChild);
                }
            };
            var decoder = new WebCodeCamJS("canvas").buildSelectMenu('select', 'environment|back').init(arg).stop();

        </script>

        <script>

            $("#target").click(function() {
                decoder.stop();
            });
                
            $("#play").click(function() {
                decoder.play();
            });

        </script>
  </div>
  <div class="modal-footer">
    <a href="#!" class="modal-close waves-effect waves-green">Agree</a>
  </div>
</div>              

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

        <div class="col m6 s12">
            <div class="card">
                <div class="card-content">
                <span class="card-title">Updates</span>
                <ul class="badge-updates">
                    <li>
                    <span class="new badge red" data-badge-caption="refund"></span>
                    <span class="message">45$ refunded to Alan Chang</span>
                    <span class="time">14 minutes ago</span>
                    </li>
                    <li>
                    <span class="new badge green" data-badge-caption="purchase"></span>
                    <span class="message">45$ from Alan Chang</span>
                    <span class="time">14 minutes ago</span>
                    </li>
                    <li>
                    <span class="new badge red" data-badge-caption="refund"></span>
                    <span class="message">45$ refunded to Alan Chang</span>
                    <span class="time">14 minutes ago</span>
                    </li>
                </ul>
                </div>
            </div>
        </div>

@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script>
    $(document).ready(function(){
        $('.modal').modal();
    });
</script>