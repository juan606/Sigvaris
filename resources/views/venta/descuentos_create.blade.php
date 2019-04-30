@extends('principal')
@section('content')
<div class="container">
	<div class="card">
        
        <form class="" action="{{route('descuentos.store')}}" method="post">
            <div class="card-header">
                <h1>Nuevo Descuento</h1>
            </div>
            <div class="card-body">    
                {{ csrf_field() }}
                <div class="row">
                    <div class="form-group col-3">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" required="">
                    </div>
                    <div class="form-group col-3">
                        <label for="nombre">De:</label>
                        <input type="date" class="form-control" name="nombre" id="nombre" required="">
                    </div>
                    <div class="form-group col-3">
                        <label for="valor">A:</label>
                        <input type="date" step="0.01" name="valor" class="form-control" id="valor" required="">
                    </div>
                   
                </div>
                    <br>
                    <label>Tipo: </label>
                    <div class="form-group col-10">
                        <input type="checkbox">
                        <label>Compra: </label>
                        <input type="number" class="form-group col-1" name="nombre" id="nombre" required="">
                        <label> Llevate: </label>
                        <input type="number" class="form-group col-1" name="nombre" id="nombre" required="">
                    </div>

                    <div class="form-group col-10">
                        <input type="checkbox">
                        <label>Monto minimo de compra: </label>
                        <input type="number" class="form-group col-1" name="nombre" id="nombre" required="">
                        <label>$ por un descuento de: </label>
                        <input type="number" class="form-group col-1" name="nombre" id="nombre" required="">
                        <select class="form-group col-1" name="descuento_id" id="descuento_id"  required="">
                                
                               
                                <option value="">$</option>
                                <option value="">%</option>
                                
                        </select>
                    </div>

                    <div class="form-group col-10">
                        <input type="checkbox">
                        <label>Descuento por cumpleaños </label>
                        <input type="number" class="form-group col-1" name="nombre" id="nombre" required="">
                        <select class="form-group col-1" name="descuento_id" id="descuento_id"  required="">
                                
                               
                                <option value="">$</option>
                                <option value="">%</option>
                                
                        </select>
                    </div>

                    <div class="form-group col-10">
                        <input type="checkbox">
                        <label>Monto minimo de prendas: </label>
                        <input type="number" class="form-group col-1" name="nombre" id="nombre" required="">
                        <label> por un descuento de: </label>
                        <input type="number" class="form-group col-1" name="nombre" id="nombre" required="">
                        <select class="form-group col-1" name="descuento_id" id="descuento_id"  required="">
                                
                               
                                <option value="">$</option>
                                <option value="">%</option>
                                
                        </select>
                    </div>

                    <div class="form-group col-10">
                        <input type="checkbox">
                        <label>Monto minimo de prendas: </label>
                        <input type="number" class="form-group col-1" name="nombre" id="nombre" required="">
                        <label> por: </label>
                        <input type="number" class="form-group col-2" name="nombre" id="nombre" required="">
                        <label>sigpesos</label>
                    </div>

                    <div class="form-group col-10">
                        <input type="checkbox">
                        <label>Descuento de empleado: </label>
                        <input type="number" class="form-group col-1" name="nombre" id="nombre" required="">
                        <select class="form-group col-1" name="descuento_id" id="descuento_id"  required="">
                                
                               
                                <option value="">$</option>
                                <option value="">%</option>
                                
                        </select>
                    </div>

                    <div class="col-3 pt-4">
                        <button type="submit" class="btn btn-success btn-lg btn-block">Agregar</a>
                    </div>
                </div>
            </div>
        </form>
</div>

@endsection