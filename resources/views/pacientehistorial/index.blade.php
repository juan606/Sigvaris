@extends('paciente.show')
@section('submodulos')

    <div class="row my-5">
        <div class="col-4 px-5"><h4>Historial</h4></div>
        <input id="submenu" type="hidden" name="submenu" value="nav-historial"> 
    </div>
    <div class="row">
        <div class="col-10 offset-1">
            <table class="table table-striped table-bordered table-hover  mb-4" style="color:rgb(51,51,51); border-collapse: collapse; margin-bottom: 0px;">
                <thead>
                    <tr class="info">
                        <th>Fecha</th>
                        <th>Descripción</th>
                        <th>Cantidad</th>
                        <th>Monto</th>  
                    </tr>
                </thead>
                @foreach ($paciente as $registro)
                    <tr>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                    </tr>
                @endforeach
            </table>
            <div class="row">
                <div class="col-4 offset-2">
                    <div class="form-group">
                        <label for="totalmonto">Total Monto Comprado</label>
                        <input type="email" class="form-control" id="totalmonto" placeholder="$1500.00">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="totalprendas">Total Prendas Compradas</label>
                        <input type="email" class="form-control" id="totalprendas" placeholder="$2500.00">
                    </div>
                </div>
            </div>
        </div>
        
    </div>

@endsection