<div class="card-header">
    <h4>Medicos</h4>
</div>
<div class="card-body">
    <div class="row mx-3 my-4">
    	<table class="table" id="medicos">
    	    <thead>
    	        <tr>
    	            <th>ID</th>
    	            <th>Médico</th>
    	            <th>Pacientes Recomendados 1° vez </th>
    	            <th>Pacientes de recompra</th>
    	            <th>Total pacientes recomendados</th>
    	        </tr>
    	    </thead>
    	    <tbody id="TBMedicos">
            @foreach($medicos as $medico)
                @php
                    $primeravez = 0;
                    $recompra = 0;
                @endphp
                <tr>
                    <td>{{ $medico->id }}</td>
                    <td>{{ $medico->fullname }}</td>
                    @php
                    foreach($medico->pacientes as $paciente){
                        if ($paciente->ventas->count() == 1) 
                            $primeravez++;
                        elseif($paciente->ventas->count() > 1)
                            $recompra++;
                        else
                            continue;
                    }
                    @endphp
                    <td>{{ $primeravez }}</td>
                    <td>{{ $recompra }}</td>
                    <td>{{ $medico->pacientes->count() }}</td>
                </tr>
            @endforeach
    	    </tbody>
    	</table>
    </div>
</div>