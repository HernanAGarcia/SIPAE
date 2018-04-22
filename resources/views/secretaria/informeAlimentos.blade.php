@extends('secretaria.template.main')

@section('content')
<div class="container">
  <h1>Informes de entrega de alimentos</h1><br>

  <div class="row" >
      <div class="col-md-5">
        <select name="listaInstitucion" id="lista-Institucion" class="form-group">
            <option disabled selected>Seleccione institución</option>
            @foreach($listaInstitucion as $institucion)
            <option value="{{$institucion->id}}">{{$institucion->nombre}}</option>
            @endforeach
          </select>

      </div>


      <div class="col-md-3">
        <button class="form-group">Mostrar</select>
      </div>


  </div>


  <div>

   <table class="table table-hover">
    <tr>
      <th>Nombre</th>
      <th>Opciones</th>
    </tr>
    @foreach($archivos as $archivo)
    <tr>
      <td><a value="{{$archivo}}">{{$archivo}}</a></td>
      <td><a class="link" href="/institucion/cargarInfoAlimentos/{{$archivo}}">Descargar</a></td>
      <!--En href va a la funcion de descargar-->
    </tr>
    @endforeach
  </table>



  </div>



</div>

@endsection



@section('scripts')

<script type="text/javascript">
  $('#lista-Institucion').on('change'(function(e){
  });
</script>

<script src="js/listaAsistencias.js"></script>

@endsection
