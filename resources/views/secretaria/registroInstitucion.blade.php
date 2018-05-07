@extends('secretaria.template.main')
@section('css')
<link rel="stylesheet" href="css/bootstrap.min.css">
@section('content')
<div class="container">
    <h3>Página de Registro de Instituciones</h3>
    <p>
    En esta sección de la página se pueden resgistrar las instituciones que estan focalizadas
    en el programa de alimentación escolar (PAE). A continuación, se presenta el formulario 
    donde podrá diligenciar los datos de cada una de las instituciones.
    <br>
    Todos los campos son de caracter obligatorios
    </p>

    <form class="form" action="{{ route('registrarInstitucion')}}" method="POST" role="form">
    {{ csrf_field() }}
        <div class="form-group">
            <label for="example-text-input">Nombre Institución</label>
            <input class="form-control" name="nombreInstitucion" type="text" placeholder="Nombre Institucion" id="nombreInstitucion" required="">
        </div>
        <div class="form-group">
            <label for="example-text-input">NIT</label>
            <input class="form-control" name="NIT" type="text" placeholder="NIT de la Institución" id="nit" required="">
        </div>
        <div class="form-group">
            <label for="example-text-input">Rector</label>
            <input class="form-control" name="rector" type="text" placeholder="Rector de la Institución" id="rector" required="">
        </div>
        <div class="form-group">
            <label for="example-text-input">Dirección </label>
            <input class="form-control" name="direccion" type="text" placeholder="Dirección de la Institución" id="direccion" required="">
        </div>
        <div class="form-group">
            <label for="example-text-input">Telefono</label>
            <input class="form-control" name="telefono" type="tel" placeholder="Telefono de la Institución" id="telefono" required="">
        </div>
        <div class="form-group">
            <label for="example-text-input">Correo Electronico</label>
            <input class="form-control" name="email" type="email" placeholder="Correo de la Institución" id="email" required="">
            {!! $errors->first('email','<span class="help-block">:message</span>')!!}
        </div>
        <div class="form-group">
            <label for="example-text-input">Contraseña</label>
            <input class="form-control" name="password" type="password" placeholder="Contraseña" id="password" required="">
        </div>

        <button class="btn btn-lg btn-primary btn-block" type="submit">
      <font style="vertical-align: inherit;">Registrar Institucion</font>
    </button>
    </form>
</div>
@endsection