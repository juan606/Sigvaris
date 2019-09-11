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
                    <form class="form-inline" method="POST" action="{{route('reportes.4')}}">
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
                        {{-- Input categoria por primera vez --}}
                        <div class="form-check mr-3">
                            <input class="form-check-input" type="radio" name="categorias" id="primeraVez" value="primeraVez">
                            <label class="form-check-label" for="primeraVez">
                                primera vez
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

                    @if (Request::input('categorias') == 'prendas')
                        @include('componentes.pacientes.lista_por_numero_prendas',["dataList"=>$dataList])
                    @endif

                    @if(Request::input('categorias') == 'sku')
                        @include('componentes.pacientes.lista_por_numero_prendas_y_sku',['sku_y_num_pacentes'=>$sku_y_num_pacentes])
                    @endif
                    
                    @if(Request::input('categorias') == 'primeraVez')
                        @include('componentes.pacientes.lista_por_primera_vez',['pacientes'=>$pacientes])
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>


@endsection