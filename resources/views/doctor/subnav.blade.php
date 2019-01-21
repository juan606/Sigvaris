<ul class="nav nav-pills nav-justified">
    <li role="presentation" class="nav-item"><a href="{{ route('doctores.consultorios.index', ['doctor' => $doctor]) }}" id="nav-consultorios" class="nav-link">Consultorios:</a></li>
    <li role="presentation" class="nav-item"><a href="{{ route('doctores.especialidades.index', ['doctor' => $doctor]) }}" id="nav-especialidades" class="nav-link">Especialidades:</a></li>
    <li role="presentation" class="nav-item"><a href="{{ route('doctores.premios.index', ['doctor' => $doctor]) }}" id="nav-premios" class="nav-link">Premios:</a></li>
</ul>