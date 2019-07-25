@extends('secretaria.template.main')

@section('content')
<div class="container">
    <h3 class="text-center">Actualización de Datos</h3>
    <p>
    En esta sección de la página se puede actualizar los datos de una institución que estan focalizadas
    en el programa de alimentación escolar (PAE). A continuación, se presenta el formulario
    donde podrá visualizar los datos actuales de la institución y poder reescribir estos datos.
    <br>
    Todos los campos son de caracter obligatorios.
    <br>
    Por favor no dejar ningun campo en blanco, si esto para la actualización no se realiza de 
    forma exitosa.
    </p>

    <form class="form" action="{{Route('secretaria.actualizarInstitucion',['id'=>$id])}}" method="POST" role="form">
    {{ csrf_field() }}
        <div class="form-group">
            <label for="example-text-input">Nombre Institución</label>
            <input class="form-control" name="nombreInstitucion" type="text" placeholder="Nombre Institucion" id="nombreInstitucion" required="" value="{{$nombre}}">
        </div>
        <div class="form-group">
            <label for="example-text-input">NIT</label>
            <input class="form-control" name="NIT" type="text" placeholder="NIT de la Institución" id="nit" required="" value="{{$nit}}">
        </div>
        <div class="form-group">
            <label for="example-text-input">Rector</label>
            <input class="form-control" name="rector" type="text" placeholder="Rector de la Institución" id="rector" required="" value='{{$rector}}'>
        </div>
        <div class="form-group">
            <label for="example-text-input">Dirección </label>
            <input class="form-control" name="direccion" type="text" placeholder="Dirección de la Institución" id="direccion" required="" value='{{$direccion}}'>
        </div>
        <div class="form-group">
            <label for="example-text-input">Telefono</label>
            <input class="form-control" name="telefono" type="tel" placeholder="Telefono de la Institución" id="telefono" required="" value='{{$telefono}}'>
        </div>
        <div class="form-group">
            <label for="example-text-input">Correo Electronico</label>
            <input class="form-control" name="email" type="email" placeholder="Correo de la Institución" id="email" required="" value='{{$correo}}'>
            {!! $errors->first('email','<span class="help-block">:message</span>')!!}
        </div>
        <div class="form-group">
            <label for="example-text-input">Nueva Contraseña</label>
            <input class="form-control" name="password" type="password" placeholder="Contraseña" id="password">
        </div>

        <button class="btn btn-lg btn-primary btn-block" id="registrarInstitucion" type="submit" >
            <font style="vertical-align: inherit;">Actualiza Datos</font>
        </button>
    </form>
</div>
@endsection