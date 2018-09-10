@extends('secretaria.template.main')

@section('content')
<div class="container">
<h2> Búsqueda de institución</h2>
<div class="row" >

          <div class="col-md-6">
            <select data-placeholder="Búsqueda de una institución"
                    class="chosen-select" name="listaInstitucion" id="lista-Institucion" >
                    <option value=""></option>
                    @foreach($instituciones as $institucion)
                        <option value="{{$institucion->id}}">{{$institucion->nombre}}</option>
                    @endforeach
              </select>
          </div>

          <div class="col-md-3">
            <button class="botonBuscar" name="boton-buscar">Buscar</select>
          </div>

      </div>


<h2> Listado de Intituciones </h2>

    <table class="table table-hover">
        <tr>
            <td>Nombre Institución</td>
            <td>Rector</td>
            <td>Opciones</td>
        </tr>
        
        @foreach($instituciones as $institucion)
            <tr>
                <td>{{$institucion->nombre}}</td>
                <td>{{$institucion->rector}}</td>
            </tr>
        @endforeach        
        </tr>
    </table>



</div>
@endsection

@section('scripts')

<script src="js/listaAsistencias.js"></script>
@endsection