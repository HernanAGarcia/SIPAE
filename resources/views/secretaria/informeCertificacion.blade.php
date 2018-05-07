@extends('secretaria.template.main')

@section('content')
<div class="container">
    <h1>Página de informes de certificación con operador</h1>


    <form action="/secretaria/certificaciones" method="post" enctype="multipart/form-data">
      {{csrf_field()}}

      <p>
      <h5>Aquí se pueden subir los certificados de cobertura</h5>
      </p>
      <input type="file" name="archivo" id="archivo"/><br>
      <br>

      <input type="submit"/>
    </form>




</div>


<div class="container">

  <table class="table table-hover">
   <tr>
     <th>Nombre</th>
     <th>Ver</th>
     <th>Descargar</th>
   </tr>
   @foreach($certificados as $archivo)
   <tr>
     <td><a value="{{$archivo}}">{{$archivo}}</a></td>
     <td><a class="link" href="/secretaria/verCertificados/{{$archivo}}">Ver</a></td>
     <td><a class="link" href="/secretaria/descargarCertificados/{{$archivo}}">Descargar</a></td>
     <!--En href va a la funcion de descargar-->
   </tr>
   @endforeach
 </table>

</div>




@endsection
