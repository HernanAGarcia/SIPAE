@extends('secretaria.template.main')

@section('content')
<div class="container">
    <h1>Modificación de datos</h1>

    <form action="{{Route('secretaria.actualizarDatos')}}" method="post">
    {{ csrf_field() }}
        <div class="form-label-group">
            <label for="input"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nueva Contraseña:</font></font></label>
            <input type="password" name="nuevosPassword" id="input" class="form-control" placeholder="Nueva Contraseña" required="" autofocus="">
        </div>
        <br>
        <button class="btn btn-lg btn-primary btn-block" type="submit">
      <font style="vertical-align: inherit;">Actualizar Datos</font>
    </button>
    </form>
</div>

@endsection
