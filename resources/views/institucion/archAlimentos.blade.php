@extends('institucion.template.mainInst')

@section('content')
<div class="container">
  <h1>Pagina para carga los archivos de informe de alimentos</h1>


  <form action="/subirArchivo" method="post" enctype="multipart/form-data">
    {{csrf_field()}}

    <input type="file" name="archivo" id="archivo"/><br>
    <!--falta mostrar que se subio el archivo-->  
    <input type="submit"/>
  </form>
</div>

@endsection
