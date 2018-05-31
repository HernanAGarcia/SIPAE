@extends('secretaria.template.main')
@section('css')
<link rel="stylesheet" href="css/bootstrap.min.css">
@section('content')
<div class="container">
    <h3>Página de Registro del Operador</h3>
    <p>
    En esta sección de la página se puede resgistrar el operador con el cual se va a trabajar 
    en el programa de alimentación escolar (PAE). A continuación, se presenta el formulario
    donde podrá diligenciar cada uno de los datos del operador.
    <br>
    Todos los campos son de caracter obligatorios
    </p>

    <form class="form" action="{{ route('registrarOperador')}}" method="POST" role="form">
    {{ csrf_field() }}
        <div class="form-group">
            <label for="example-text-input">Nombre del Operador</label>
            <input class="form-control" name="nombreOperador" type="text" placeholder="Nombre Operador" id="nombreOperador" required="">
        </div>
        <div class="form-group">
            <label for="example-text-input">NIT</label>
            <input class="form-control" name="NIT" type="text" placeholder="NIT del Operador" id="nit" required="">
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
      <font style="vertical-align: inherit;">Registrar Operador</font>
    </button>
    </form>
</div>
@endsection
