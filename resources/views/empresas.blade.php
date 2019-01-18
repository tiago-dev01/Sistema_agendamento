@extends('site')

@section('conteudo')
    <!-- provide the csrf token -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <table id="table_id" class="highlight">
        <thead>
            <tr>
                <th>id</th>
                <th>id_user</th> 
                <th>nome_fantasia</th>
                <th>telefone</th>
                <th>cnpj</th> 
                <th>cep</th>
                <th>email</th>
                <th>created_at</th> 
                <th>updated_at</th>
            </tr>
        </thead>

    </table>


@endsection


<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

<script>
                    

        $(document).ready(function(){
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

                $.ajax({
                    /* the route pointing to the post function */
                    url: '/oficinasajax',
                    type: 'POST',
                    /* send the csrf-token and the input to the controller */
                    data: {_token: CSRF_TOKEN},
                    dataType: 'JSON',
                    /* remind that 'data' is the response of the AjaxController */
                    success: function (data) {    
                        //console.log(data);                     
                            $.each(data, function(i, item) {
                                var t = $('#table_id').DataTable();
                                t.row.add( [
                                    item.id,
                                    item.id_user,
                                    item.nome_fantasia,
                                    item.telefone,
                                    item.cnpj,
                                    item.cep,
                                    item.email,
                                    item.created_at,
                                    item.updated_at
                                ]).draw( false );
                            });
                    }
                }); 
          
       }); 

</script>
