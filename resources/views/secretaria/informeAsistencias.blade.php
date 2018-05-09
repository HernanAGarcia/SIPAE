@extends('secretaria.template.main')

@section('content')


<div class="container">
    <h1>Informes de asistencia de colegios</h1><br>
      </br>

      <div class="row" >

          <div class="col-md-6">
            <select data-placeholder="Seleccione una institución"
                    class="chosen-select" name="listaInstitucion" id="lista-Institucion" >
                    <option value=""></option>
                @foreach($listaInstitucion as $institucion)
                <option value="{{$institucion->id}}">{{$institucion->nombre}}</option>
                @endforeach
              </select>
          </div>

          <div class="col-md-3">
            <button class="botonAsistencias" name="boton-mostrar">Mostrar</select>
          </div>

      </div>

    <div>




       <table class="table table-hover" id="tabla"><br>
         </br>
        <tr>
          <th>Nombre</th>
          <th colspan="2">Opciones</th>
        </tr>
      </table>



      </div>




</div>





@endsection



@section('scripts')

<script src="js/listaAsistencias.js"></script>

@endsection
