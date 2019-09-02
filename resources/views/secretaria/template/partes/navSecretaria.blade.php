<!-- As a heading -->
<nav class="navbar  navbar-expand-lg  navbar-light bg-primary" style="align-items: flex-end; margin-bottom: 0%">
        
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <span class="navbar-brand text-white ">Bienvenido: {{Auth::user()->email}}</span>
            </li>
            <li class="nav-item {{ (Request::is('secretaria/modificarDatos') ? 'active' : '') }}" style="align-items: flex-end;">
                <a class="nav-link active text-white" href="{{ Route('secretaria.modificarDatos')}}">Perfil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active text-white" href="{{ Route('logout')}}">Salir</a>
            </li>
        </ul>
        
    </div>
</nav>