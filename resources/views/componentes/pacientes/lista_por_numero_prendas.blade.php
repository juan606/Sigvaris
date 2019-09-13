
<table class="table table-hover table-striped table-bordered" style="margin-bottom: 0;" id="listaEmpleados">
    <thead>
        <tr class="info">
            <th># prendas</th>
            <th># pacientes</th>
        </tr>
    </thead>
    <tbody>
        @foreach($dataList as $key => $data)
            @if (isset($dataList[$key]))
                <tr>
                    <td>{{$key}}</td>
                    <td>{{$data}}</td>
                </tr>
            @endif
        @endforeach
    </tbody>    
</table>

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>    
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#listaEmpleados').DataTable();
    } );
</script>


<script>
    </script>