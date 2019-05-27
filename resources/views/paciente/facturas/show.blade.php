@extends('principal')
@section('content')

<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-4">
                <h4>Datos fiscales:</h4>
            </div>
            <div class="col-4 text-center">
                <a href="{{ route('facturas.index') }}" class="btn btn-primary">
                    <i class="fa fa-bars"></i><strong> Lista de facturas</strong>
                </a>
            </div>
        </div>
    </div>
    <form role="form" name="Form" {{-- onsubmit="return validateForm()" --}} id="form-cliente" method="POST" action="{{ route('facturas.store') }}" name="form">
        {{ csrf_field() }}

        <div class="card-body">
            <div class="row">
                <div class="form-group col-3">
                    <label for="paciente_id">Paciente:</label>
                    <input type="text" class="form-control" name="paciente_id" id="paciente_id" value="{{$factura->venta->paciente->nombre}} {{$factura->venta->paciente->paterno}} {{$factura->venta->paciente->materno}}" readonly="">
                </div>

                <div class="form-group col-3" id="div_ventas">
                    <label for="venta_id">Venta:</label>
                    <input type="text" class="form-control" name="venta_id" id="venta_id" value="{{ $factura->venta->id }}.- {{$factura->venta->fecha}}" readonly="">                    
                </div>

                <div class="form-group col-3" id="div_ventas">
                    <label for="venta_id">Fecha:</label>
                    <input type="text" class="form-control" name="venta_id" id="venta_id" value="{{ $factura->created_at->toDateString() }}" readonly="">                    
                </div>
            </div>
        </div>
        

        <div class="card-body" id="formulario">
            <div class="row">
                <div class="col-3 form-group">
                    <label class="control-label">Tipo de persona:</label>
                    @if ($factura->venta->fisica)
                        <input type="text" name="tipo_persona" value="Persona fisica" class="form-control" readonly="">
                    @else
                        <input type="text" class="form-control" name="tipo_persona" value="Persona moral" readonly="">
                    @endif
                </div>
                <div class="col-3 form-group">
                    <label class="control-label">Nombre o razon social:</label>
                    <input type="text" name="nombre" class="form-control" required="" id="nombre" value="{{ $factura->nombre }}" readonly="">
                </div>
                <div class="col-3 form-group">
                    <label class="control-label">Regimen fiscal:</label>
                    <input type="text" name="regimen_fiscal" class="form-control" required="" id="nombre" value="{{ $factura->regimen_fiscal }}" readonly="">
                </div>
                <div class="col-3 form-group">
                    <label class="control-label">Homoclave:</label>
                    <input type="text" name="homoclave" class="form-control" required="" id="homoclave" value="{{ $factura->homoclave }}" readonly="">
                </div>
                <div class="col-3 form-group">
                    <label class="control-label">Correo:</label>
                    <input type="email" name="correo" class="form-control" id="correo" value="{{ $factura->correo }}" readonly="">
                </div>
                <div class="col-3 form-group">
                    <label class="control-label">RFC:</label>
                    <input type="text" name="rfc" class="form-control" id="rfc" value="{{ $factura->rfc }}" readonly="">
                </div>          
            </div>                        
            <div class="row">                
                <div class="col-3 form-group">
                    <label class="control-label">Calle</label>
                    <input type="text" name="calle" class="form-control" required="" value="{{ $factura->calle }}" readonly="">
                </div>
                <div class="col-3 form-group">
                    <label class="control-label">Numero exterior</label>
                    <input type="text" name="num_ext" class="form-control" required="" value="{{ $factura->num_ext }}" readonly="">
                </div>
                <div class="col-3 form-group">
                    <label class="control-label">Numero interior</label>
                    <input type="text" name="num_int" class="form-control" value="{{ $factura->num_int }}" readonly="">
                </div>
                <div class="col-3 form-group">
                    <label class="control-label">Colonia</label>
                    <input type="text" name="colonia" class="form-control" required="" value="{{ $factura->colonia }}" readonly="">
                </div>
                <div class="col-3 form-group">
                    <label class="control-label">Ciudad</label>
                    <input type="text" name="ciudad" class="form-control" required="" value="{{ $factura->ciudad }}" readonly="">
                </div>
                <div class="col-3 form-group">
                    <label class="control-label">Alcaldia o municipio</label>
                    <input type="text" name="municipio" class="form-control" required="" value="{{ $factura->municipio }}" readonly="">
                </div>
                <div class="col-3 form-group">
                    <label class="control-label">Estado</label>
                    <input type="text" name="estado" class="form-control" required="" value="{{ $factura->estado }}" readonly="">
                </div>
                <div class="col-3 form-group">
                    <label class="control-label">C.P.</label>
                    <input type="text" name="cp" class="form-control" required="" value="{{ $factura->cp }}" readonly="">
                </div>
            </div>
        </div>
    </form>
</div>
@endsection