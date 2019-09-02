@extends('principal')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center">REPORTE DE LOS PACIENTES</h4>
                </div>
                <div class="card-body">
                    <form class="form-inline" method="POST" action="{{route('reportes.2')}}">
                        @csrf
                        {{-- Input de fecha inicial --}}
                        <div class="form-group mr-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text">DE:</div>
                            </div>
                            <input type="date" class="form-control input-fecha" name="fecha_inicial" id="fechaInicial">
                        </div>
                        {{-- Input de fecha final --}}
                        <div class="form-group mr-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text">A:</div>
                            </div>
                            <input type="date" class="form-control input-fecha" name="fecha_final" id="fechaFinal">
                        </div>
                        {{-- Input de categoria por prendas compradas--}}
                        <div class="form-check mr-3">
                            <input class="form-check-input" type="radio" name="categorias" id="prendas" value="prendas" checked>
                            <label class="form-check-label" for="prendas">
                                por prendas vendidas
                            </label>
                        </div>
                        {{-- Input categoria por sku --}}
                        <div class="form-check mr-3">
                            <input class="form-check-input" type="radio" name="categorias" id="sku" value="sku">
                            <label class="form-check-label" for="sku">
                                por sku
                            </label>
                        </div>
                        {{-- Boton submit para fechas --}}
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Buscar</button>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    {{-- Tabla de los pacientes --}}
                    @include('componentes.pacientes.lista_por_numero_prendas')
                    {{-- @include('componentes.pacientes.lista_por_numero_prendas_y_sku') --}}
                </div>
            </div>
        </div>
    </div>
</div>


@endsection