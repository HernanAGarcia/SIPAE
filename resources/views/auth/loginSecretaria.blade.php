@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="css/bootstrap.min.css">
<link href="css/floating-labels.css" rel="stylesheet">
<link type="text/css" rel="stylesheet" charset="UTF-8" href="css/translateelement.css">

@section('content')
<div class="container">

  <form class="form-signin" role="form" method="POST" action="{{ route('login')}}">
    {{ csrf_field() }}
    <div class="text-center mb-4">

      <h1 class="h3 mb-3 font-weight-normal">

        <font style="vertical-align: inherit;">SIPAE</font>
      </h1>
      <p>
        <font style="vertical-align: inherit;">Ministerio de Educacion Nacional</font>
        <br>
        <font style="vertical-align: inherit;">Secretaria de Educación. </font>
      </p>
    </div>

    <div class="form-label-group {{ $errors->has('email') ? ' has-error' : '' }}">
      <input type="email" name="email" id="input" class="form-control" placeholder="Correo Electronico" required="" autofocus="">
      {!! $errors->first('email','<span class="help-block">:message</span>')!!}
      <label for="input"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Correo Electronico</font></font></label>
    </div>

    <div class="form-label-group{{ $errors->has('password') ? ' has-error' : '' }}">
      <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Contraseña" required="">
      <label for="inputPassword"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Contraseña</font></font></label>
    </div>

    <button class="btn btn-lg btn-primary btn-block" type="submit">
      <font style="vertical-align: inherit;">Iniciar Sesión</font>
    </button>

    <p class="mt-5 mb-3 text-muted text-center"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">© 2017-2018</font></font></p>
  </form>
  @endsection
