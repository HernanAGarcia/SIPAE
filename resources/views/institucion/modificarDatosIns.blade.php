@extends('institucion.template.mainInst')

@section('content')
<div class="container">
<h1>Modificación de datos</h1>

<form action="{{ Route('institucion.actualizarDatosInst')}}" method="post">
{{ csrf_field() }}
<div class="form-label-group">
        <label for="input"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Rector:</font></font></label>
        <input type="text" name="rector" id="input" class="form-control" placeholder="Nombre del Rector" required="" autofocus="" value="{{$rector}}">
    </div>
    <div class="form-label-group">
        <label for="input"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Dirección:</font></font></label>
        <input type="text" name="direccion" id="input" class="form-control" placeholder="Dirección Institución" required="" autofocus="" value="{{$direccion}}">
    </div>
    <div class="form-label-group">
        <label for="input"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Telefono:</font></font></label>
        <input type="text" name="telefono" id="input" class="form-control" placeholder="Telefono" required="" autofocus="" value="{{$telefono}}">
    </div>
    <div class="form-label-group">
        <label for="input"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nueva Contraseña:</font></font></label>
        <input type="password" name="nuevoPassword" id="input" class="form-control" placeholder="Nueva Contraseña" required="" autofocus="">
    </div>
    <br>
    <button class="btn btn-lg btn-primary btn-block" type="submit">
      <font style="vertical-align: inherit;">Actualizar Datos</font>
    </button>
</form>
</div>

@endsection