<div class="card-header">
    <h4>Clientes</h4>
</div>
<div class="card-body">
	<div class="row">
        <div class="input-group m-auto col-sm-6">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon3">Desde</span>              
                <input type="date" class="form-control" id="desdeC" aria-describedby="basic-addon3">
            </div>            
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon3">Hasta</span>
                <input type="date" class="form-control" id="hastaC" aria-describedby="basic-addon3">
            </div>                
        </div>
    </div>
    <div class="row my-3">
        <div class="col-sm-12 text-center">
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" id="primeraC" name="tipoCliente" value="primero">
              <label class="form-check-label" for="inlineCheckbox1">Primera vez</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" id="consecutivoC" name="tipoCliente" value="consecutivo">
              <label class="form-check-label" for="inlineCheckbox2">Consecutivo</label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-2 m-auto mb-3 ">
            <button class="btn btn-outline-secondary" type="button" id="reporteClientes">Buscar</button>
        </div>
    </div>
    <div class="row mx-3 my-4">
    	<table class="table" id="">
    	    <thead>
    	        <tr>
    	            <th>ID</th>
    	            <th>Cliente</th>
    	            <th>Fecha</th>
    	            <th>Total (sin IVA)</th>
    	            <th>Total</th>
    	            <th>Número dePiezas</th>
    	        </tr>
    	    </thead>
    	    <tbody id="clientes">                            	
    	    </tbody>
    	</table>
    </div>
</div>