@extends('principal')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            <h4 class="text-center text-uppercase text-muted">CAMBIO FÍSICO DE PRODUCTO</h4>
            <div class="card">
                <div class="card-body">
                    <form action="{{route('ventas.cambio-fisico.store',['venta'=>$venta->id])}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-md-6 mt-2">
                                <label for="" class="text-uppercase text-muted">SKU PRODUCTO QUE SE REGRESA</label>
                                <input name="skuProductoRegresado" id="skuProductoRegresado" type="text"
                                    class="form-control" required>
                            </div>
                            <div class="col-12 col-md-6 mt-2">
                                <label for="" class="text-uppercase text-muted">SKU PRODUCTO QUE SE ENTREGA</label>
                                <input name="skuProductoEntregado" id="skuProductoEntregado" type="text"
                                    class="form-control" required>
                            </div>

                            {{-- CONTENEDOR PRODUCTO DEVUELTO --}}
                            <div class="col-12 col-md-6 mt-2">
                                <h5 class="text-center text-uppercase text-muted"> PRODUCTO DEVUELTO</h5>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12 col-lg-4">
                                                <label for="" class="text-uppercase text-muted">SKU</label>
                                                <input type="text" value="N/D" class="form-control" readonly
                                                    id="inputSkuProductoDevuelto">
                                            </div>
                                            <div class="col-12 col-lg-4">
                                                <label for="" class="text-uppercase text-muted">PRECIO</label>
                                                <input type="text" value="N/D" class="form-control" readonly
                                                    id="inputPrecioProductoDevuelto">
                                            </div>
                                            <div class="col-12 col-lg-4">
                                                <label for="" class="text-uppercase text-muted">DESCRIPCION</label>
                                                <input type="text" value="N/D" class="form-control" readonly
                                                    id="inputDescripcionProductoDevuelto">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- CONTENEDOR PRODUCTO ENTREGADO --}}
                            <div class="col-12 col-md-6 mt-2">
                                <h5 class="text-center text-uppercase text-muted"> PRODUCTO ENTREGADO</h5>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12 col-lg-4">
                                                <label for="" class="text-uppercase text-muted">SKU</label>
                                                <input type="text" value="N/D" class="form-control" readonly
                                                    id="inputSkuProductoEntregado">
                                            </div>
                                            <div class="col-12 col-lg-4">
                                                <label for="" class="text-uppercase text-muted">PRECIO</label>
                                                <input type="text" value="N/D" class="form-control" readonly
                                                    id="inputPrecioProductoEntregado">
                                            </div>
                                            <div class="col-12 col-lg-4">
                                                <label for="" class="text-uppercase text-muted">DESCRIPCION</label>
                                                <input type="text" value="N/D" class="form-control" readonly
                                                    id="inputDescripcionProductoEntregado">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-md-4 col-lg-3 mt-2">
                                <label for="" class="text-uppercase text-muted">OBSERVACIONES</label>
                                <textarea name="observaciones" id="" cols="30" rows="4" class="form-control"></textarea>
                            </div>
                            <div class="col-12 col-md-4 col-lg-3 mt-2">
                                <label for="" class="text-uppercase text-muted">DIFERENCIA</label>
                                <input type="text" readonly class="form-control" id="diferenciaDinero">
                            </div>

                            <div class="col-12 mt-2">
                                <button type="submit" class="btn btn-success rounded-0">GUARDAR</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    /**
    * ======
    * EVENTS
    * ======
    */

    $(document).ready( function(){

    } );

    $(document).on('change', '#skuProductoRegresado', async function(){

        const skuProducto = $(this).val()
        producto = await getProducto(skuProducto)

        console.log({
            mensaje: 'REGRESADO',
            producto: producto
        })

        $('#inputSkuProductoDevuelto').val(producto.sku  == null ? 'N/D' : producto.sku)
        $('#inputPrecioProductoDevuelto').val(producto.precio_publico_iva  == null ? 'N/D' : producto.precio_publico_iva)
        $('#inputDescripcionProductoDevuelto').val(producto.descripcion == null ? 'N/D' : producto.descripcion)

        calcularDiferenciaCosto()

    });

    $(document).on('change', '#skuProductoEntregado', async function(){
        const skuProducto = $(this).val()
        producto = await getProducto(skuProducto)
        console.log({
            mensaje: 'ENTREGADO',
            producto: producto
        })

        $('#inputSkuProductoEntregado').val(producto.sku  == null ? 'N/D' : producto.sku)
        $('#inputPrecioProductoEntregado').val(producto.precio_publico_iva  == null ? 'N/D' : producto.precio_publico_iva)
        $('#inputDescripcionProductoEntregado').val(producto.descripcion == null ? 'N/D' : producto.descripcion)

        calcularDiferenciaCosto()
    });

    /**
    * =========
    * FUNCIONES
    * =========
    */

    function calcularDiferenciaCosto(){
        const precioProductoEntregado = $('#inputPrecioProductoEntregado').val()
        const precioProductoDevuelto = $('#inputPrecioProductoDevuelto').val()
        const diferencia = parseFloat(precioProductoEntregado) - parseFloat(precioProductoDevuelto)

        console.log({
            message: 'CALCULAR DIFERENCIA',
            precioProductoEntregado,
            precioProductoDevuelto,
            diferencia: parseFloat(precioProductoEntregado) - parseFloat(precioProductoDevuelto)
        });

        $('#diferenciaDinero').val(diferencia)

    }

    async function getProducto(skuProducto){

        producto = await $.ajax({
            method: "GET",
            url: `/api/productos/sku/${skuProducto}`,
        })
        .done(function( msg ) {
            console.log(msg);
        });

        return producto;

    }

</script>

@endsection