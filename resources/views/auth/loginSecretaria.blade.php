@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="css/bootstrap.min.css">
<link href="css/floating-labels.css" rel="stylesheet">
<link rel="stylesheet" charset="UTF-8" href="css/translateelement.css">
<link rel="stylesheet" href ="css/sweetalert.min.css" >

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-auto">
    <img src="{{'img/simboloGobernacion.png'}}" border="0" width="100" height="100">
    </div>
    <div class="col-md-auto">
    <div class="text-center">
    
        <h1 class="text-center mb-2">
          <font style="vertical-align: inherit;">SIPAE</font>
        </h1>
        <p>
          <font style="vertical-align: inherit;">Ministerio de Educación Nacional</font>
          <br>
          <font style="vertical-align: inherit;">Secretaria de Educación. </font>
        </p>
      </div> 
    </div> 
    <div class="col-1">
      <img src="{!! asset('img/quindio-corazon-de-la-zona-cafetera.jpg') !!}" border="0" width="100" height="100">
    </div>
  </div>
  <form class="form-signin" role="form" method="POST" action="{{ route('login')}}">
  {{ csrf_field() }}
    <h2 class="h2 text-center font-weight-normal">
      <font style="vertical-align: inherit;">Inicio de Sesión</font>
    </h2>
    <div class="form-label-group {{ $errors->has('email') ? ' has-error' : '' }}">
      <input type="email" name="email" id="input" class="form-control" placeholder="Correo Electronico" required="" autofocus="">
      {!! $errors->first('email','<span class="help-block">:message</span>')!!}
      <label for="input"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Correo Electronico</font></font></label>
    </div>

    <div class="form-label-group{{ $errors->has('password') ? ' has-error' : '' }}">
      <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Contraseña" required="">
      <label for="inputPassword"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Contraseña</font></font></label>
    </div>

    <button class="btn btn-lg btn-primary btn-block" type="submit" id="iniciarSesion">
      <font style="vertical-align: inherit;">Iniciar Sesión</font>
    </button>

    <p class="mt-5 mb-3 text-muted text-center"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">© 2017-2018</font></font></p>
  </form>
  
  @endsection
