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

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!--Estilos-->
  <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/navbar.css')}}" >
  <link rel="stylesheet" href ="{{asset('css/sweetalert.min.css')}}" >

  <!-- Scripts -->
  <script>
  window.Laravel = <?php echo json_encode([
    'csrfToken' => csrf_token(),
  ]); ?>
  </script>
</head>
<body>
  <div class="container">

    <h1>SIPAE</h1>

    <h5 class="text-right"> <small>Ministerio de Educación Nacional</small></h5><br>
    <h5 class="text-right"> <small>Secretaría de Educación Armenia, Quindío</small></h5>

    @include('operador.template.partes.navOp')
  </div>
  @yield('content')

  <!-- Bootstrap core JavaScript
  ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="{{asset('js/jquery-3.1.1.slim.min.js')}}" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
  <script>window.jQuery || document.write('<script src="js/jquery.min.js"><\/script>')</script>
  <script src="{{asset('js/tether.min.js')}}" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
  <script src="{{ asset('js/bootstrap.min.js')}}"></script>

<script src="{{ asset('js/jquery-3.2.1.slim.min.js')}}"></script>
<script src="{{ asset('js/popper.js')}}"></script>
  <script src="{{ asset('js/jquery.js')}}"></script>
  <script src="{{ asset('js/sweetalert.min.js')}}"></script>


  @include('sweet::alert')

</body>
</html>
