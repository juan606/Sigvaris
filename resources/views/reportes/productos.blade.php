@extends('principal')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center">REPORTE DE LOS PRODUCTOS</h4>
                </div>
                <div class="card-body">
                    <div class="form-inline">
                        <div class="form-group mr-5">
                            <div class="input-group-prepend">
                                <div class="input-group-text">DE:</div>
                            </div>
                            <input type="date" class="form-control" name="fecha_inicial">
                        </div>
                        <div class="form-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">A:</div>
                            </div>
                            <input type="date" class="form-control" name="fecha_final">
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    {{-- Tabla de los productos --}}
                    <table class="table table-hover table-striped table-bordered" style="margin-bottom: 0;" id="listaEmpleados">
                        <thead>
                            <tr class="info">
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Apellido paterno</th>
                                <th>Apellido materno</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach($empleados as $key => $empleado) --}}
                                <tr>
                                    <td>1</td>
                                    <td>2</td>
                                    <td>3</td>
                                    <td>4</td>
                                    <td>
                                        <button type="button" class="btn btn-success btn-crear">
                                            boton
                                        </button>
                                    </td>
                                </tr>
                            {{-- @endforeach --}}
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
        $('#listaEmpleados').DataTable();
    } );
</script>


<script>

@endsection