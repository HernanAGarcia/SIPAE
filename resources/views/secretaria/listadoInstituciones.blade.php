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
            <button class="botonBuscar" name="boton-buscar">Buscar</select></t>
          </div>
          <div class="col-md-3">
            <form method="get" action="{{ route('secretaria.registroInstitucion')}}">
            {{ csrf_field() }}
            <button class="btn btn-primary" name="boton-agregar-institucion">Agregar Institución</select>
            </form>
          </div>

      </div>


<h2> Listado de Intituciones </h2>

    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Nombre Institución</td>
                <th scope="col">Rector</td>
                <th scope="col">Opciones</td>
            </tr>
        </thead> 
        <tbody>
        @foreach($instituciones as $institucion)
            <tr>
            
                <td>{{$institucion->nombre}}</td>
                <td>{{$institucion->rector}}</td>
                <td><a class="link" href="{{ Route('secretaria.viewActualizarInstitucion',['id'=>$institucion->id]) }}"> Editar</a>
                <a class="link" href="#"> Eliminar</a></td>
            </tr>
        @endforeach        
        </tbody>
    </table>



</div>
@endsection

@section('scripts')

<script src="js/listaAsistencias.js"></script>
@endsection