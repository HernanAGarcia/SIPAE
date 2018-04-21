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


    <div>
      <table class="egt">

        <tr>
          <th scope="row">Día</th>
          <th>Hoy</th>
          <th>Mañana</th>
          <th>Domingo</th>
        </tr>

        <tr>
          <th>Condición</th>
          <td>Soleado</td>
          <td>Mayormente soleado</td>
          <td>Parcialmente nublado</td>
        </tr>

        <tr>
          <th>Temperatura</th>
          <td>19°C</td>
          <td>17°C</td>
          <td>12°C</td>
        </tr>

        <tr>
          <th>Vientos</th>
          <td>E 13 km/h</td>
          <td>E 11 km/h</td>
          <td>S 16 km/h</td>
        </tr>

      </table>

    </div>



</div>

@endsection



@section('scripts')

<script type="text/javascript">
  $('#listaInstitucion').on('change'(function(e){

    console.log(e);
  });
</script>

<script src="js/dropdown.js"></script>

@endsection
