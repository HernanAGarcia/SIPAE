<!DOCTYPE html>
<html lang="es" class="">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'SIPAE') }}</title>

  <!--Estilos-->
  
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/navbar.css')}}" >
  <link rel="stylesheet" href="{{asset('plugins/chosen/chosen.css')}}" >
  <link rel="stylesheet" href="{{asset('css/sweetalert.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/style.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"> 


  <!-- Scripts -->
  <script>
  window.Laravel = <?php echo json_encode([
    'csrfToken' => csrf_token(),
  ]); ?>
  </script>
</head>
<body>
<!--Contenedor general-->
<div class="container-fluid">
  <!--Contenedor del encabezado y el menú-->
  <div class="container-fluid" >
    <div class="row">
      <div class="col-md-2">
        <img class="rounded float-left" src="/img/simboloGobernacion.png" border="0" width="100" height="100">
      </div>
      <div class="col-md">
        <h1 class="text-left">SIPAE</h1>
        <h5 class="text-right"> <small>Ministerio de Educación Nacional</small></h5>
        <h5 class="text-right"> <small>Secretaría de Educación Armenia, Quindío</small></h5>
      </div>
      <div class="col-md-2">
        <img class="rounded float-right" src="/img/quindio-corazon-de-la-zona-cafetera.jpg" border="0" width="100" height="100">
      </div>
    </div> 
  </div>
  <div >
      @include('secretaria.template.partes.navSecretaria')      
  </div>
  <div class="wrapper">
    <div style="height: 100%; float: left">
        @include('secretaria.template.partes.navLateral')  
    </div>  
    <div>
        @yield('content')
    </div>  
  </div>
  <!-- Bootstrap core JavaScript
  ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <!--<script src="{{asset('js/jquery-3.1.1.slim.min.js')}}" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
  -->

  <script src="{{ asset('js/jquery-3.3.1.js')}}"></script>
  <script>window.jQuery || document.write('<script src="js/jquery.min.js"><\/script>')</script>
  <script src="{{asset('js/tether.min.js')}}" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
  <script src="{{ asset('js/bootstrap.min.js')}}"></script>
  <script src="{{ asset('js/jquery.js')}}"></script>
  <script src="{{ asset('plugins/chosen/chosen.jquery.js')}}"></script>
  <script src="{{ asset('js/sweetalert.min.js')}}"></script>
  <!--<script src="js/bootstrap.min.js"></script>-->


  {!! Html::script('js\listaAsistencias.js')!!}
  <!-- Incluya esto después del archivo de alerta dulce js -->
  @include('sweet::alert')
  </div>
</body>
</html>
