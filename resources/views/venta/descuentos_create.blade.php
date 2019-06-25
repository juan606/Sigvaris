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
                        <label for="inicio">De:</label>
                        <input type="date" class="form-control" name="inicio" id="inicio" required="">
                    </div>
                    <div class="form-group col-3">
                        <label for="fin">A:</label>
                        <input type="date" step="0.01" name="fin" class="form-control" id="fin" required="">
                    </div>
                   
                </div>
                    <br>
                    <label>Tipo: </label>
                    <div class="form-check col-10">
                        <input type="checkbox" class="form-check-input" name="tipoA" id="tipoA">
                        <label>Compra: </label>
                        <input type="number" class="form-control col-2" name="compra_minA" id="compra_minA">
                        <label> Llevate: </label>
                        <input type="number" class="form-control col-2" name="descuento_deA" id="descuento_deA">
                    </div>

                    <div class="form-group col-10">
                        <input type="checkbox" name="tipoB" id="tipoB">
                        <label>Monto minimo de compra: </label>
                        <input type="number" class="form-control col-2" name="compra_minB" id="compra_minB" >
                        <label>$ por un descuento de: </label>
                        <input type="number" class="form-control col-2" name="descuento_deB" id="descuento_deB">
                        <select class="form-control col-2" name="unidad_descuentoB" id="unidad_descuentoB"  required="">        
                                <option value="$">$</option>
                                <option value="%">%</option>
                        </select>
                    </div>                    
                    <div class="form-group col-10">
                        <input type="checkbox" name="tipoC" id="tipoC">
                        <label>Descuento por cumpleaños </label>
                        <input type="number" class="form-control col-2" name="descuento_deC" id="descuento_deC">
                        <select class="form-control col-2" name="unidad_descuentoC" id="unidad_descuentoC">
                                <option value="$">$</option>
                                <option value="%">%</option>
                        </select>
                    </div>

                    <div class="form-group col-10">
                        <input type="checkbox" name="tipoD" id="tipoD">
                        <label>Monto minimo de prendas: </label>
                        <input type="number" class="form-control col-2" name="compra_minD" id="compra_minD">
                        <label> por un descuento de: </label>
                        <input type="number" class="form-control col-2" name="descuento_deD" id="descuento_deD">
                        <select class="form-control col-2" name="unidad_descuentoD" id="unidad_descuentoD">                               
                                <option value="$">$</option>
                                <option value="%">%</option>
                        </select>
                    </div>

                    <div class="form-group col-10">
                        <input type="checkbox" name="tipoE" id="tipoE">
                        <label>Monto minimo de prendas: </label>
                        <input type="number" class="form-control col-2" name="compra_minE" id="compra_minE">
                        <label> por: </label>
                        <input type="number" class="form-control col-2" name="descuento_deE" id="descuento_deE">
                        <label>sigpesos</label>
                    </div>

                    <div class="form-group col-10">
                        <input type="checkbox" name="tipoF" id="tipoF">
                        <label>Descuento de empleado: </label>
                        <input type="number" class="form-control col-2" name="descuento_deF" id="descuento_deF">
                        <select class="form-control col-2" name="unidad_descuentoF" id="unidad_descuentoF">
                                <option value="$">$</option>
                                <option value="%">%</option>                  
                        </select>
                    </div>

                    <div class="col-3 pt-4">
                        <button type="submit" class="btn btn-success btn-lg btn-block">Agregar</a>
                    </div>
                </div>
            </div>
        </form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#tipoA').change(function(){
            if(this.checked)
            {
                $('#compra_minA').prop('required',true);
                $('#descuento_deA').prop('required',true);
            }
            else
            {
                $('#compra_minA').prop('required',false);
                $('#descuento_deA').prop('required',false);
            }            
        });

         $('#tipoB').change(function(){
            if(this.checked)
            {
                $('#compra_minB').prop('required',true);
                $('#descuento_deB').prop('required',true);
            }
            else
            {
                $('#compra_minB').prop('required',false);
                $('#descuento_deB').prop('required',false);
            }            
        });

          $('#tipoC').change(function(){
            if(this.checked)
            {
                $('#descuento_deC').prop('required',true);
            }
            else
            {
                $('#descuento_deC').prop('required',false);
            }            
        });

          $('#tipoD').change(function(){
            if(this.checked)
            {
                $('#compra_minD').prop('required',true);
                $('#descuento_deD').prop('required',true);
            }
            else
            {
                $('#compra_minD').prop('required',false);
                $('#descuento_deD').prop('required',false);
            }            
        });

          $('#tipoE').change(function(){
            if(this.checked)
            {
                $('#compra_minE').prop('required',true);
                $('#descuento_deE').prop('required',true);
            }
            else
            {
                $('#compra_minE').prop('required',false);
                $('#descuento_deE').prop('required',false);
            }            
        });

          $('#tipoF').change(function(){
            if(this.checked)
            {
                $('#descuento_deF').prop('required',true);
            }
            else
            {
                $('#descuento_deF').prop('required',false);
            }            
        });
    });
</script>
@endsection