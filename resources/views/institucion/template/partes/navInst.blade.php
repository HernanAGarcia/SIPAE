<nav class="navbar navbar-toggleable-md navbar-inverse bg-primary justify-content-between">

  <nav class="navbar navbar-inverse bg-primary justify-content-between">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </nav>
    <div class="collapse navbar-collapse justify-content-md-center" id="navbarToggleExternalContent">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="{{ Route('institucion')}}">Inicio<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ Route('institucion.cargarAsistencia')}}">Cargar listados de Asistencia</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="">Listado de Beneficiados</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ Route('institucion.cargarInfoAlimentos')}}">Informes Alimentarios</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ Route('logout')}}">Salir</a>
      </li>
    </ul>
  </div>
</nav>
