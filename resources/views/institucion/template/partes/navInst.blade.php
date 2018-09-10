
<nav class="navbar navbar-toggleable-md navbar-inverse bg-primary justify-content-between">

  <nav class="navbar navbar-inverse bg-primary justify-content-between">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </nav>
    <div class="collapse navbar-collapse justify-content-md-center" id="navbarToggleExternalContent">
    <ul class="navbar-nav">
      <li class="{{ (Request::is('institucion') ? 'active' : '') }}">
        <a class="nav-link" href="{{ Route('institucion')}}">Inicio<span class="sr-only">(current)</span></a>
      </li>
      <li class="{{ (Request::is('institucion/infomeAsistencias') ? 'active' : '') }}">
        <a class="nav-link" href="{{ Route('institucion.cargarAsistencia')}}">Cargar listados de Asistencia</a>
      </li>
      <li class="{{ (Request::is('institucion/beneficiarios') ? 'active' : '') }}">
        <a class="nav-link" href="{{ Route('institucion.beneficiarios')}}">Listado de Beneficiarios</a>
      </li>
      <li class="{{ (Request::is('institucion/informeAlimentos') ? 'active' : '') }}">
        <a class="nav-link" href="{{ Route('institucion.cargarInfomeAlimentos')}}">Informes Alimentarios</a>
      </li>
      <li class="{{ (Request::is('institucion/modificarDatos') ? 'active' : '') }}">
        <a class="nav-link" href="{{ Route('institucion.ModificarDatosInst')}}">Modificar Datos</a>
      </li>
      <li class="{{ (Request::is('logout') ? 'active' : '') }}">
        <a class="nav-link" href="{{ Route('logout')}}">Salir</a>
      </li>
    </ul>
  </div>
</nav>
