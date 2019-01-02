<table class="table table-striped table-bordered table-hover" style="color:rgb(51,51,51); border-collapse: collapse; margin-bottom: 0px;">
			<thead>
				<tr class="info">
					<th>ID</th>
					<th>Nombre</th>
					<th>Apellido Paterno</th>
					<th>Apellido Materno</th>
					<th>R.F.C.</th>
					<th>Acciones</th>
				</tr>
			</thead>
			@foreach ($empleados as $empleado)
				@isset($empleado->nombre)
				<tr class="active"
				    title="Has Click Aquì para Ver"
					style="cursor: pointer"
					href="#{{$empleado->id}}">
					
					<td>{{$empleado->id}}</td>
					<td>{{$empleado->nombre}}</td>
					<td>{{$empleado->appaterno}}</td>
					<td>{{$empleado->apmaterno}}</td>
					<td>{{$empleado->rfc}}</td>
					<td>
						<a class="btn btn-success btn-sm" href="{{ route('empleados.show',['empleado'=>$empleado]) }}"><i class="fa fa-eye" aria-hidden="true"></i><strong> Ver</strong></a>
						<a class="btn btn-info btn-sm" href="{{ route('empleados.edit',['empleado'=>$empleado]) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i><strong> Editar </strong></a>
					</td>
				</tr>
				@endisset
			@endforeach
		</table>

		