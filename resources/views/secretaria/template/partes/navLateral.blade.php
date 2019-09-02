<nav id="sidebar" >
        <div class="sidebar-header">
            <h5>Menu</h5>
        </div>
        <ul class="list-unstyled components">
            <li >
                <a href="{{ Route('secretaria')}}">Inicio</a>
                
            </li>
            
            <li>
                <a href="#pageSubmenuGestion" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Gestionar</a>
                <ul class="collapse list-unstyled " id="pageSubmenuGestion">
                        <li>
                            <a href="{{ Route('secretaria.listadoInstituciones')}}">Gestionar Instituciones</a>
                        </li>
                        <li>
                            <a href="{{ Route('secretaria.registrarOperador')}}">Gestionar Operador</a>
                        </li>
                    </ul> 
            </li>
            <li>
                <a href="#pageSubmenuListado" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Cargar Informes</a>
                <ul class="collapse list-unstyled" id="pageSubmenuListado">
                    <li>
                        <a href="{{ Route('secretaria.ListadoPae')}}">Listado de Beneficiarios</a>
                    </li>
                    <li>
                        <a href="{{ Route('secretaria.infoCertificaciones')}}">Informes de Certificación</a>
                    </li>
                </ul> 
            </li>
            <li>
                <a href="#pageSubmenuInforme" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Ver Informes</a>
                <ul class="collapse list-unstyled" id="pageSubmenuInforme">
                    <li>
                        <a href="{{ Route('secretaria.infoAsistencias')}}">Informe de Asistencia Estudiantil</a>
                    </li>
                    <li>
                        <a href="{{ Route('secretaria.infoAlimentos')}}">Informe de Alimentos</a>
                    </li>
                </ul> 
            </li>
            <li class="{{ (Request::is('secretaria/modificarDatos') ? 'active' : '') }}">
                <a href="{{ Route('secretaria.modificarDatos')}}">Modificar Datos</a>
            </li>
        </ul>
    </nav>