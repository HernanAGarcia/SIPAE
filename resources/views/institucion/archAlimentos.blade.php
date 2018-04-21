@extends('institucion.template.mainInst')

@section('content')
<div class="container">
  <h1>Pagina para carga los archivos de informe de alimentos</h1>


  <form action="/institucion/cargaInfoAlimentos" method="post" enctype="multipart/form-data">
    {{csrf_field()}}
    
    <p>
    <h5>Aquí se pueden subir los archivos donde se especifica lo que se recibio de recursos
    alimentarios por parte del proveedor</h5>
    </p>
    <input type="file" name="archivo" id="archivo"/><br>
    <br>
    
    <input type="submit"/>
  </form>

 <table class="table table-hover">
  <tr>
    <th>Nombre</th>
    <th>Opciones</th> 
  </tr>
  @foreach($archivos as $archivo)
  <tr>
    <td><a value="{{$archivo}}">{{$archivo}}</a></td>
    <td><a class="link" href="#" value="{{$archivo}}">Descargar</a></td> 
    <!--En href va a la funcion de descargar-->
  </tr>
  @endforeach
</table>
</div>

@endsection
