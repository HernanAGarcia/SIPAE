@extends('operador.template.mainOp')

@section('content')
<div class="container">
    <h1>Certificados de Cobertura</h1>

</div>


<div class="container">

  <table class="table table-hover">
   <tr>
     <th>Nombre</th>
     <th>Descargar</th>
   </tr>

   @foreach($certificado as $archivo)
   <tr>
     <td><a value="{{$archivo}}">{{$archivo}}</a></td>
     <td><a class="link" href="/operador/descargarCertificados/{{$archivo}}">click para descargar</a></td>
     <!--En href va a la funcion de descargar-->
   </tr>
   @endforeach


 </table>

</div>

@endsection
