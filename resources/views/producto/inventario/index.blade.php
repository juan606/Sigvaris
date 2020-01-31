@extends('principal')
@section('content')

<div class="container">
    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif
    <div class="row">
        <div class="col-12">
            <div class="card mb-5">
                {{-- TITULO DE LA SECCIÓN --}}
                <div class="card-header">INVENTARIO</div>
                {{-- TABLA DE INVENTARIO --}}
                <div class="card-body">
                    <table class="table table-hover table-striped table-bordered" style="margin-bottom: 0;"
                        id="tablaInventario">
                        <thead>
                            <tr class="info">
                                <th>SKU</th>
                                <th>LINE</th>
                                <th>UPC</th>
                                <th>SWISS ID</th>
                                <th>STOCK</th>
                                <th>ACCIONES</th>
                                {{-- <th>HISTORIAL</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($productos as $producto)
                            <tr>
                                <td>{{$producto->sku}}</td>
                                <td>{{$producto->line}}</td>
                                <td>{{$producto->upc}}</td>
                                <td>{{$producto->swiss_id}}</td>
                                <td>{{$producto->stock}}</td>
                                <td>
                                    <a class="btn btn-warning"
                                        href="{{route('producto.inventario.modificar',['producto_id'=>$producto->id])}}">
                                        MODIFICAR
                                    </a>
                                </td>
                                {{-- <td>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#historial-{{$producto->id}}">
                                        HISTORIAL
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="historial-{{$producto->id}}" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    {{$producto->id}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td> --}}
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
        $('#tablaInventario').DataTable();
    } );
</script>

@endsection