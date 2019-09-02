@extends('secretaria.template.main')

@section('content')
    <div class="container">
        <h3>Aquí se pueden subir los certificados de cobertura con operador</h3><br>

        <form action="/secretaria/certificaciones" method="post" enctype="multipart/form-data">
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
      <table class="table table-hover">
        <tr>
          <th>Nombre</th>
          <th>Ver</th>
          <th>Descargar</th>
        </tr>
        @foreach($certificados as $archivo)
          <tr>
            <td><a value="{{$archivo}}">{{$archivo}}</a></td>
            <td><a class="link" href="/secretaria/verCertificados/{{$archivo}}" target="_blank">click para ver</a></td>
            <td><a class="link" href="/secretaria/descargarCertificados/{{$archivo}}">click para descargar</a></td>
            <!--En href va a la funcion de descargar-->
          </tr>
        @endforeach
      </table>
    </div>
@endsection
