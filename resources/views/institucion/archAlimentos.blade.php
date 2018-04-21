@extends('institucion.template.mainInst')

@section('content')
<div class="container">
  <h1>Pagina para carga los archivos de informe de alimentos</h1>


  <form action="/institucion/subirArchivo" method="post" enctype="multipart/form-data">
    {{csrf_field()}}
    <p>
    <h5>Aquí se pueden subir los archivos donde se especifica lo que se recibio de recursos
    alimentarios por parte del proveedor</h5>
    </p>
    <input type="file" name="archivo" id="archivo"/><br>
    <br>
    <input type="submit"/>
  </form>

  <!--Listar los listados subidos del actual al más antiguo-->
  

</div>

@endsection
