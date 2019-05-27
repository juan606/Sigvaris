<select class="form-control" name="promo_id" id="promo_id">
    <option value="">Seleccione un tipo de promocion</option>
    @foreach ($promociones as $promocion)
        <option value="{{$promocion->id}}">
        	@switch($promocion->tipo)
        	    @case('A')
        	        Compra: {{ $promocion->compra_min }} Llevate: {{ $promocion->descuento_de }}
        	        @break
        	    @case('B')
        	    	Monto minimo de compra: {{ $promocion->compra_min }}$ por un descuento de: {{ $promocion->descuento_de }}
        	    	@break
        	    @case('C')
        	    	Descuento por cumpleaños: {{ $promocion->descuento_de }}{{ $promocion->unidad_descuento }}
        	    	@break
        	    @case('D')
        	    	Monto minimo de prendas: {{$promocion->compra_min}} por un descuento de {{$promocion->descuento_de}}{{$promocion->unidad_descuento}}
        	    	@break
        	    @case('E')
        	    	Monto minimo de prendas: {{$promocion->compra_min}} por {{$promocion->descuento_de}} {{$promocion->unidad_descuento}}
        	    	@break
        	    @case('F')
        	    	Descuento de empleado: {{$promocion->descuento_de}}{{$promocion->unidad_descuento}}
        	    	@break
        	
        	    {{-- @default
        	            Default case... --}}
        	@endswitch
        </option>
    @endforeach    
</select>