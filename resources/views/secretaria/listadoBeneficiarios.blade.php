@extends('secretaria.template.main')

@section('content')
<div class="container">
    <h1>Aquí se pueden subir los listados de beficiarios (titulares derecho)</h1><br>
      </br>

        <form action="/secretaria/beneficiarios" method="post" enctype="multipart/form-data">
          {{csrf_field()}}
          <div class="row" >
              <div class="col-md-7">
                <input type="file" name="archivo" id="archivo"/>
              </div>
              <div class="col-md-3">
                <input type="submit"/>
              </div>
          </div>
        </form>
</div>

<div class="container"><br>
</br>

      <table class="table table-hover">
       <tr>
         <th>Nombre</th>
         <th>Descargar</th>
       </tr>
       @foreach($listados as $archivo)
       <tr>
         <td><a value="{{$archivo}}">{{$archivo}}</a></td>
         <td><a class="link" href="/secretaria/descargarListados/{{$archivo}}">click para descargar</a></td>
         <!--En href va a la funcion de descargar-->
       </tr>
       @endforeach
     </table>

</div>



@endsection
