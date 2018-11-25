@extends('layouts.app')

@section('content')


<link rel="stylesheet" href="{{ asset( elixir('css/admin-materialize.min.css') ) }}" charset="utf-8">

<div class="container">
  <div class="row">
    <div class="col s6 offset-s7">

      <div class="card card-login">

        <img  src="{{ asset('storage/veiculo_mecanica.png') }}" alt="" height="250"  >
        
        <div class="card-content">

          <span class="card-title">Log In</span>

          <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
            @csrf

            <div class="input-field">

              <input id="email" type="text" class="validate" name="email" required autofocus>
              <label for="email" class="">email</label>

            </div>
            
            <div class="input-field">

              <input id="password" type="password" class="validate" name="password" required>
              <label for="password" class="">senha</label>

            </div>
           

            <a href="{{ route('password.request') }}">Forgot Password?</a>

            <br><br>
            <div>
              <input class="btn right" type="submit" value="Log In">
              <a href="#!" class="btn-flat">Back</a>
            </div>

          </form>
        </div>
      </div>

    </div>
  </div>

</div>

@endsection

<!-- Scripts -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="js/materialize.min.js"></script>
