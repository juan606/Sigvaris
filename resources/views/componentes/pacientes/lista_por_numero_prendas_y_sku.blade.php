<table class="table table-hover table-striped table-bordered" style="margin-bottom: 0;" id="conSku">
    <thead>
        <tr class="info">
            <th>N°</th>
            <th>Fecha</th>
            <th>Sku</th>
            <th># prendas</th>
            <th># pacientes</th>
        </tr>
    </thead>
    <tbody>
        {{-- @foreach($empleados as $key => $empleado) --}}
            <tr>
                <td>1</td>
                <td>2</td>
                <td>3</td>
                <td>4</td>
            </tr>
        {{-- @endforeach --}}
    </tbody>    
</table>

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>    
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#conSku').DataTable();
    } );
</script>


<script>
    </script>