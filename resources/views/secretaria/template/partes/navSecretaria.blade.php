<nav class="navbar  navbar-toggleable-md navbar-inverse bg-primary ">

  <nav class="navbar navbar-inverse bg-primary ">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </nav>
  <div class="collapse navbar-collapse justify-content-md-center" id="navbarToggleExternalContent">
    <ul class="navbar-nav ">
      <li class="{{ (Request::is('secretaria') ? 'active' : '') }}">
        <a class="nav-link" href="{{ Route('secretaria')}}">Inicio<span class="sr-only">(current)</span></a>
      </li>
      
      <li class="nav-item dropdown {{ (Request::is('secretaria/ListadoInstituciones','secretaria/registrarOperador') ? 'active' : '') }}">
        <a class="nav-link dropdown-toggle" name="registrar" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Gestionar
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" name ="registrarInstitucion" href="{{ Route('secretaria.listadoInstituciones')}}">Gestionar Instituciones</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" name="registrarOperador" href="{{ Route('secretaria.registrarOperador')}}">Gestionar Operador</a>
        </div>
      </li> 
      <li class="nav-item dropdown {{(Request::is('secretaria/beneficiarios','secretaria/certificaciones') ? 'active':'') }}">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Cargar Informes
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{ Route('secretaria.ListadoPae')}}">Listados de beneficiarios</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{ Route('secretaria.infoCertificaciones')}}">Informes de Certificación</a>
        </div>
      </li>

      <li class="nav-item dropdown {{Request::is('secretaria/asistencias','secretaria/alimentos') ? 'active':''}}">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Ver Informes
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{ Route('secretaria.infoAsistencias')}}">Informes de Asistencia</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{ Route('secretaria.infoAlimentos')}}">Informes de Alimentos</a>
        </div>
      </li>

      <li class="{{ (Request::is('secretaria/modificarDatos') ? 'active' : '') }}">
        <a class="nav-link" href="{{ Route('secretaria.modificarDatos')}}">Modificar Datos Usuario</a>
      </li>
      <li class="{{ (Request::is('logout') ? 'active' : '') }} ">
        <a class="nav-link" name="salir" href="{{ Route('logout')}}">Salir</a>
      </li>
    </ul>
  </div>
</nav>
