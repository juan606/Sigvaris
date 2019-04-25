@extends('principal')
@section('content')
<div class="card">
    <h5 class="card-header">Descuentos</h5>
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                <h5 class="card-title">Nuevo Descuento</h5>
            </div>
        </div>
        <form class="" action="{{route('descuentos.store')}}" method="post">
            {{ csrf_field() }}
            <div class="row">
                <div class="form-group col-3">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" required="">
                </div>
                <div class="form-group col-3">
                    <label for="tipo">Tipo</label>
                    <select class="form-control" name="tipo" id="tipo" required="">
                        <option value="">Seleccionar...</option>
                        <option value="1">tipo1</option>
                        <option value="2">tipo2</option>
                        <option value="3">tipo3</option>
                        <option value="4">tipo4</option>
                        <option value="5">tipo5</option>
                    </select>
                </div>
                <div class="form-group col-3">
                    <label for="valor">Valor</label>
                    <input type="vaue" step="0.01" name="valor" class="form-control" id="valor" required="">
                </div>
                <div class="col-3 pt-4">
                    <button type="submit" class="btn btn-success btn-lg btn-block">Agregar</a>
                </div>
            </div>
        </form>
        <div class="row">
            <div class="col-12">
                <h5 class="card-title">Lista de Descuentos</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Tipo</th>
                            <th>Valor</th>
                            <th>Operaciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($descuentos as $descuento)
                        <tr>
                            <td>{{$descuento->nombre}}</td>
                            <td>{{$descuento->tipo}}</td>
                            <td>{{$descuento->valor}}</td>
                            <td><button>hey</button></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
@endsection