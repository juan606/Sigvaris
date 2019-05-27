<select class="form-control" name="venta_id" id="venta_id">
    <option value="">Seleccione una venta</option>
    @foreach ($ventas as $venta)
        <option value="{{$venta->id}}">{{$venta->id}}-.{{$venta->fecha}}</option>
    @endforeach    
</select>