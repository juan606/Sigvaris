@extends('certificacionesTienda.index')

@section('cursocreat')

<div class="container">
    <div class="card">
        <div class="card-header"><h5>Nueva certificación</h5></div>
        <div class="card-body">
            <form action="{{route('oficinas.certificaciones.store', ['oficina'=>$oficina])}}" method="POST">
                @csrf
                
                <input type="text" name="oficina_id" id="oficina_id" class="form-control" style="display: none;" value="{{ $oficina->id }}"required>
                <div class="row">
                    {{-- INPUT NOMBRE --}}
                    <div class="col-12 col-sm-6 col-md-4 mt-2">
                        <label for="nombre">nombre</label>
                        <input type="text" name="nombre" class="form-control" required>
                    </div>
                    {{-- INPUT ES CERTIFICADO --}}
                    <div class="col-12 col-sm-6 col-md-4 mt-2">
                        <label for="es_certificado text-muted text-uppercase">¿Es certificado?</label>
                        <select name="es_certificado" id="" class="form-control" required>
                            <option value="1">Sí</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    {{-- INPUT CALIFICACION --}}
                    <div class="col-12 col-sm-6 col-md-4 mt-2">
                        <label for="calificacion">Calificación</label>
                        <input type="number" name="calificacion" required class="form-control" required>
                    </div>
                    {{-- INPUT FECHA --}}
                    <div class="col-12 col-sm-6 col-md-4 mt-2">
                        <label for="fecha">Fecha</label>
                        <input type="date" name="fecha" required class="form-control" required>
                    </div>
                    {{-- INPUT DURACIÓN --}}
                    <div class="col-12 col-sm-6 col-md-4 mt-2">
                        <label for="duracion">Duración (días)</label>
                        <input type="number" name="duracion" required class="form-control" required>
                    </div>
                    {{-- INPUT NOMBRE INSTRUCTOR --}}
                    <div class="col-12 col-sm-6 col-md-4 mt-2">
                        <label for="instructor">Instructor</label>
                        <input type="text" name="instructor" required class="form-control" required>
                    </div>
                    {{-- INPUT NOMBRE CERTIFICADOR --}}
                    <div class="col-12 col-sm-6 col-md-4 mt-2">
                        <label for="certificador">¿Quién certifica?</label>
                        <input type="text" name="certificador" required class="form-control" required>
                    </div>
                    
                </div>
                <hr>
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-success rounded-0">Guardar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection