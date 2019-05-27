@extends('principal')
@section('content')
<div class="container">
    <div class="card">
        
        <form class="" action="{{route('descuentos.update',['descuento'=>$descuento])}}" method="post">
            <div class="card-header">
                <h1>Descuento</h1>
            </div>
            <div class="card-body">    
                {{ csrf_field() }}
                <div class="row">
                    <div class="form-group col-3">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" required="" value="{{ $descuento->nombre }}" readonly="">
                    </div>
                    <div class="form-group col-3">
                        <label for="inicio">De:</label>
                        <input type="date" class="form-control" name="inicio" id="inicio" required="" value="{{ $descuento->inicio }}" readonly="">
                    </div>
                    <div class="form-group col-3">
                        <label for="fin">A:</label>
                        <input type="date" step="0.01" name="fin" class="form-control" id="fin" required="" value="{{ $descuento->fin }}" readonly="">
                    </div>
                   
                </div>
                    <br>
                    <label>Tipo: </label>
                    @if ($descuento->promociones->where('tipo','A')->first())
                        <div class="form-group col-10">
                            <label>Compra: </label>
                            <input type="text" class="form-group col-1" name="compra_minA" id="compra_minA" value="{{ $descuento->promociones->where('tipo','A')->first()->compra_min }}" readonly="">
                            <label> Llevate: </label>
                            <input type="text" class="form-group col-1" name="descuento_deA" id="descuento_deA" value="{{ $descuento->promociones->where('tipo','A')->first()->descuento_de }}" readonly="">
                        </div>
                    @endif 
                    
                    @if ($descuento->promociones->where('tipo','B')->first())
                        <div class="form-group col-10">
                            <label>Monto minimo de compra: </label>
                            <input type="text" class="form-group col-1" name="compra_minB" id="compra_minB" value="{{ $descuento->promociones->where('tipo','B')->first()->compra_min }}" readonly="">
                            <label>$ por un descuento de: </label>
                            <input type="text" class="form-group col-1" name="descuento_deB" id="descuento_deB" value="{{ $descuento->promociones->where('tipo','B')->first()->descuento_de }}" readonly="">
                            <input type="text" class="form-group col-1" value="{{ $descuento->promociones->where('tipo','B')->first()->unidad_descuento }}" readonly="">
                        </div>  
                    @endif
                    @if ($descuento->promociones->where('tipo','C')->first())
                        <div class="form-group col-10">
                            <label>Descuento por cumpleaños </label>
                            <input type="text" class="form-group col-1" name="descuento_deC" id="descuento_deC" value="{{ $descuento->promociones->where('tipo','C')->first()->descuento_de }}" readonly="">
                            <input type="text" class="form-group col-1" value="{{ $descuento->promociones->where('tipo','C')->first()->unidad_descuento }}" readonly="">
                        </div>
                    @endif

                    @if ($descuento->promociones->where('tipo','D')->first())
                        <div class="form-group col-10">
                            <label>Monto minimo de prendas: </label>
                            <input type="text" class="form-group col-1" name="compra_minD" id="compra_minD" value="{{ $descuento->promociones->where('tipo','D')->first()->compra_min }}" readonly="">
                            <label> por un descuento de: </label>
                            <input type="text" class="form-group col-1" name="descuento_deD" id="descuento_deD" value="{{ $descuento->promociones->where('tipo','D')->first()->descuento_de }}" readonly="">
                            <input type="text" class="form-group col-1" value="{{ $descuento->promociones->where('tipo','D')->first()->unidad_descuento }}" readonly="">
                        </div>
                    @endif
                        
                    @if ($descuento->promociones->where('tipo','E')->first())
                        <div class="form-group col-10">
                            <label>Monto minimo de prendas: </label>
                            <input type="text" class="form-group col-1" name="compra_minE" id="compra_minE"  value="{{ $descuento->promociones->where('tipo','E')->first()->compra_min }}" readonly="">
                            <label> por: </label>
                            <input type="text" class="form-group col-2" name="descuento_deE" id="descuento_deE" value="{{ $descuento->promociones->where('tipo','E')->first()->descuento_de }}" readonly="">
                            <label>sigpesos</label>
                        </div>
                    @endif

                    @if ($descuento->promociones->where('tipo','F')->first())
                        <div class="form-group col-10">
                            <label>Descuento de empleado: </label>
                            <input type="text" class="form-group col-1" name="descuento_deF" id="descuento_deF" value="{{ $descuento->promociones->where('tipo','F')->first()->descuento_de }}" readonly="">
                            <input type="text" class="form-group col-1" value="{{ $descuento->promociones->where('tipo','F')->first()->unidad_descuento }}" readonly="">
                        </div>
                    @endif
                </div>
            </div>
        </form>
</div>
@endsection