@extends('secretaria.template.main')

@section('content')
<div class="container">
    <h1>Informes de asistencia de colegios</h1><br>

      <div class="row" >
          <div class="col-md-5">
            <select name="listaInstitucion" id="lista-Institucion" class="form-group">
                <option disabled selected>Seleccione institución</option>
                @foreach($listaInstitucion as $institucion)
                <option value="{{$institucion->id}}">{{$institucion->nombre}}</option>
                @endforeach
              </select>

          </div>

          <div class="col-md-4">
            <select name="listaSede" id="lista-Sede" class="form-group">
                <option disabled selected>Seleccione sede</option>
            </select>
          </div>


          <div class="col-md-3">
            <button class="form-group">Mostrar</select>
          </div>


      </div>



</div>

@endsection



@section('scripts')

<script type="text/javascript">
  $('#lista-Institucion').on('change'(function(e){

    console.log(e);
  });
</script>

<script src="js/listaAsistencias.js"></script>

@endsection
