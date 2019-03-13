<nav class="navbar navbar-expand-md  navbar-dark" style="background-color: #1c3160;">
    
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
                    <a class="dropdown-item" href="{{ route('proveedores.create') }}"><span>Alta</span><i class="fa fa-plus float-right"></i></a>
                    <a class="dropdown-item" href="{{ route('proveedores.index') }}"><span>Buscar</span><i class="fa fa-search float-right"></i></a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="´{{route('giros.create')}}"><span>Giros</span><i class="fas fa-sync-alt float-right"></i></i></a>
                </div>
            </li>
            <li class="nav-item dropdown active">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Pacientes
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('pacientes.create') }}"><span>Alta</span><i class="fa fa-plus float-right"></i></a>
                    <a class="dropdown-item" href="{{ route('pacientes.index') }}"><span>Buscar</span><i class="fa fa-search float-right"></i></a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Doctores
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('doctores.create') }}"><span>Alta</span><i class="fa fa-plus float-right"></i></a>
                    <a class="dropdown-item" href="{{ route('doctores.index') }}"><span>Buscar</span><i class="fa fa-search float-right"></i></a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Recursos Humanos
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{url('empleados/create')}}"><span>Alta</span><i class="fa fa-plus float-right"></i></a>
                    <a class="dropdown-item" href="{{ url('empleados') }}"><span>Buscar</span><i class="fa fa-search float-right"></i></a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Precargas
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{route('descuentos.index')}}"><span>Descuentos</span></a>
                    <a class="dropdown-item" href="{{ url('contratos') }}"><span>Contratos</span><i class="fa fa-search float-right"></i></a>
                    <a class="dropdown-item" href="{{ url('/faltas') }}"><span>Faltas </span></a>
                    <!-- <a class="dropdown-item" href="{{ url('/areas') }}">Áreas<i class="fa fa-plus float-right"></i></a> -->
                    <!-- <a class="dropdown-item" href="{{ url('/puestos') }}">Puestos<i class="fa fa-plus float-right"></i></a> -->
                    <!-- <a class="dropdown-item" href="{{ url('bajas') }}">Bajas<i class="fa fa-plus float-right"></i></a> -->
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Punto de Venta
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{route('ventas.create')}}"><span>Venta</span><i class="fa fa-plus float-right"></i></a>
                    <a class="dropdown-item" href="{{route('ventas.index')}}"><span>Historial</span><i class="fa fa-search float-right"></i></a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Productos
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{route('productos.create')}}"><span>Alta</span><i class="fa fa-plus float-right"></i></a>
                    <a class="dropdown-item" href="{{route('productos.index')}}"><span>Buscar</span><i class="fa fa-search float-right"></i></a>
                    <a class="dropdown-item" href="{{ url('import-export-csv-excel') }}"><span>Excel</span><i class="fa fa-search float-right"></i></a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    C.R.M.
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{route('crm.index')}}"><span>General</span><i class="fa fa-search float-right"></i></a>
                </div>
            </li>
        </ul>
    </div>
</nav>
<!-- <div class="row m-0 p-0 text-white" style="background-color: #1c3160;">
    <div class="col">
        <ul id="pestanias" class="nav nav-tabs">
            <li id="pestania_1" class="nav-item">
                <a class="text-white nav-link pestania" onclick="abrirPestania('pestania_1')" href="#"><span>Prueba </span><span style="font-size: 1.2em;"><i onclick="cerrarPestania('pestania_${no_pestanias}')" class="fas fa-times-circle ml-2"></i></span></a>
            </li>
        </ul>
    </div>
</div> -->
<script>

    var no_pestanias = 0;
    $(document).ready(function(){

        //CREAR PESTAÑA
        $('.dropdown-item').click({url: 'www.facebook.com'}, crearPestania);

        //CERRAR PESTAÑA





        



    });

    function crearPestania(event){
        no_pestanias++;
        //alert(no_pestanias);
        let titulo = event.data.url;
        let nuevapestania = `<li id="pestania_${no_pestanias}" class="nav-item">
                                <a class="text-white nav-link pestania" onclick="abrirPestania('pestania_${no_pestanias}')" href="#"><span> ${titulo + no_pestanias} </span><span style="font-size: 1.2em;"><i onclick="cerrarPestania('pestania_` + no_pestanias + `')" class="fas fa-times-circle ml-2"></i></span></a>
                            </li>`
        $('#pestanias').append(nuevapestania);
        //return false;
    }

    function cerrarPestania(id){
        alert('#'+id);
        $('#'+id).remove();
    }

    function abrirPestania(id){
        $('.nav-link.pestania').removeClass('active text-dark');
        $('.nav-link.pestania').addClass('text-white');
        $('#'+id).find('a').addClass('active text-dark');
        
    }
</script>