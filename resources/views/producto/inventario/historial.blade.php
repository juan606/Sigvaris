@extends('principal')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card mb-5">
                {{-- ENCABEZADO DE LA SECCION --}}
                <div class="card-header">
                    <h4 class="text-center">HISTORIAL DE LAS MODIFICACIONES DEL INVENTARIO</h4>
                </div>
                {{-- TABLA DEL HISTORIAL --}}
                <div class="card-body">
                    <table class="table table-hover table-striped table-bordered" style="margin-bottom: 0;" id="tablaHistorialInventario">
                        <thead>
                            <tr class="info">
                                <th>FECHA</th>
                                <th>USUARIO</th>
                                <th>STOCK ANTERIOR</th>
                                <th>STOCK NUEVO</th>
                                <th>MOTIVO</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($historialModificacionesInventario as $modificacion)
                                <tr>
                                    <td>{{$modificacion->created_at}}</td>
                                    <td>{{$modificacion->user()->first()->name}}</td>
                                    <td>{{$modificacion->stock_anterior}}</td>
                                    <td>{{$modificacion->stock_nuevo}}</td>
                                    <td>{{$modificacion->motivo}}</td>
                                </tr>
                            @endforeach
                        </tbody>    
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>    
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#tablaHistorialInventario').DataTable();
    } );
</script>

@endsection