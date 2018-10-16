@extends('site')

@section('conteudo')


<style type="text/css">
    #divCenter {
      margin-left:40px;
      margin-top:50px;
    }

      #recebimento {
      margin-left:40px;
      margin-top:30px;
          width: auto;
    }

      .container {
          width: 550px;
          height: auto;
      }

      h4,h6 {
      color: grey;
      }
</style>


  <div class="divider"></div>
  <div class="section">
  </div>

  <div class="row">
    <div class="col s3">
    </div>
    <div class="container">
      <div class="card white">
        <div class="card-content black-text">
          <span class="card-title center">Agende uma data: </span>
          
          <p class="center">Insira abaixo a data de preferência, para comparecer a autorizada mais próxima: </p>
        </div>
          
          <form class="" action="{{ action('LoginController@SalvarData') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}  
                <div class="row">

                    <div class="col s4 offset-s2">
                      <input type="text" name="date" class="datepicker center"> 
                      <label for="Date" class="black-text">Data</label>
                    </div>
                    <div class="col s4">
                      <input type="text" name="time" class="timepicker center">
                      <label for="Time" class="black-text">Horário</label>
                    </div>

                    <div class="row">
                    </div>

                      <div class="col s4 offset-s9">
                        <button class="btn center">Salvar</button>
                        <a></a>
                      </div>

                    <div class="row">
                    </div>
                    
                  </div>
            </form>
      </div>
    </div>
  </div>
</form>

    
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script>
       
          $(document).ready(function(){
            $('.datepicker').datepicker();
        });

          $(document).ready(function(){
             $('.timepicker').timepicker();
        });

    </script>

    <script type="text/javascript">
			document.addEventListener('DOMContentLoaded', function() {
				const options = {
					format: 'dd-mm-yyyy',
				};
				var elems = document.querySelectorAll('.datepicker');
				var instances = M.Datepicker.init(elems, options);
			})
		</script>

    <script type="text/javascript">
      $(document).ready(function(){
        $('.modal').modal();
      });
    </script>

@endsection



