<ul class="nav nav-pills nav-fill">
    <li role="presentation" class="nav-item"><a href="{{ route('doctores.consultorios.index', ['doctor' => $doctor]) }}" id="nav-consultorios" class="nav-link submenu">Consultorios:</a></li>
    <li role="presentation" class="nav-item"><a href="{{ route('doctores.especialidades.index', ['doctor' => $doctor]) }}" id="nav-especialidades" class="nav-link submenu">Especialidades:</a></li>
    <li role="presentation" class="nav-item"><a href="{{ route('doctores.premios.index', ['doctor' => $doctor]) }}" id="nav-premios" class="nav-link submenu">Premios:</a></li>
</ul>