<nav class="navbar navbar-expand-md navbar-light" style="background-color: #e3f2fd;">
    
    <a class="navbar-brand imagenHeader-i" style="display: none;" href="/">
        Sigvaris
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown active">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Proveedores
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('proveedores.create') }}">Alta<i class="fa fa-plus float-right"></i></a>
                    <a class="dropdown-item" href="{{ route('proveedores.index') }}">Buscar<i class="fa fa-search float-right"></i></a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Giros<i class="fas fa-sync-alt float-right"></i></i></a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Doctores
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('doctores.create') }}">Alta<i class="fa fa-plus float-right"></i></a>
                    <a class="dropdown-item" href="{{ route('doctores.index') }}">Buscar<i class="fa fa-search float-right"></i></a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Recursos Humanos
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{url('empleados/create')}}">Alta<i class="fa fa-plus float-right"></i></a>
                    <a class="dropdown-item" href="{{ url('empleados') }}">Buscar<i class="fa fa-search float-right"></i></a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Precargas
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <!-- <a class="dropdown-item" href="{{ url('bajas') }}">Bajas<i class="fa fa-plus float-right"></i></a> -->
                    <a class="dropdown-item" href="{{ url('contratos') }}">Contratos<i class="fa fa-search float-right"></i></a>
                    <!-- <a class="dropdown-item" href="{{ url('/areas') }}">Áreas<i class="fa fa-plus float-right"></i></a> -->
                    <!-- <a class="dropdown-item" href="{{ url('/puestos') }}">Puestos<i class="fa fa-plus float-right"></i></a> -->
                    <!-- <a class="dropdown-item" href="{{ url('/faltas') }}">Faltas<i class="fa fa-plus float-right"></i></a> -->
                </div>
            </li>
        </ul>
    </div>
</nav>