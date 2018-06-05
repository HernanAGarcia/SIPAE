@extends('institucion.template.mainInst')

@section('content')
<div class="container">
    <h1>Puede acceder a los listados de beneficiarios actualizados por la secretaria de educación</h1>
    <br></br>
</div>

<div class="container">

  <table class="table table-hover">
   <tr>
     <th>Nombre</th>
     <th>Descargar</th>
   </tr>
   @foreach($listados as $archivo)
   <tr>
     <td><a value="{{$archivo->id}}">{{$archivo->nombre_Archivo}}</a></td>
     <td><a class="link" href="/institucion/descargarListados/{{$archivo->ruta}}">click para descargar</a></td>
     <!--En href va a la funcion de descargar-->
   </tr>
   @endforeach
 </table>

</div>

@endsection
