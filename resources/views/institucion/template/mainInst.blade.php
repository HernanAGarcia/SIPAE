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
    <!--Cabecera y barra de navegación-->
    <div class="container"  >
      <h1>SIPAE</h1>
      <h5 class="text-right"> <small>Ministerio de Educación Nacional</small></h5>
      <h5 class="text-right"> <small>Secretaría de Educación Armenia, Quindío</small></h5>
      @include('institucion.template.partes.navInst')
    </div>
    <!--Yield para el conenido que se mostrara en el cuerpo de la página-->
    @yield('content')

  <!--Contenedor para el pie de página-->
    <footer>
      <p class="MsoNormal" style="text-align: center;" align="center"><span style="mso-bidi-font-size: 14.0pt; font-family: 'Georgia','serif';">Contáctenos: PBX: (+57) (6) 7417700 -&nbsp;</span><span style="mso-bidi-font-size: 14.0pt; font-family: 'Georgia','serif';">Correo electrónico: <a href="mailto:contactenos@sedquindio.gov.co">educacion@gobernacionquindio.gov.co</a> </span></p>
      <p class="MsoNormal" style="text-align: center;" align="center"><span style="mso-bidi-font-size: 14.0pt; font-family: 'Georgia','serif';">Notificaciones Judiciales: <a href="mailto:notificacionesjudiciales@sedquindio.gov.co">notificacionesjudiciales@quindio.gov.co</a> </span></p>
      <p class="MsoNormal" style="text-align: center;" align="center"><span style="mso-bidi-font-size: 14.0pt; font-family: 'Georgia','serif';">Dirección: Calle 20 # 13-22 Piso 1 y 9 Armenia, Quindío, Colombia.</span></p>
      <p class="MsoNormal" style="text-align: center;" align="center"><span style="mso-bidi-font-size: 14.0pt; font-family: 'Georgia','serif';">Horario de atención: Lunes a Jueves 7:30 am a 12:00 m y de 2:00 pm a 6:00 pm -&nbsp;</span><span style="mso-bidi-font-size: 14.0pt; font-family: 'Georgia','serif';">Viernes de 7:30 am a 12:00 m y de 2:00 pm a 5:30 pm&nbsp;</span></p>
    </footer>


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
