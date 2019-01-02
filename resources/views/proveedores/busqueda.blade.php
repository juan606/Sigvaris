<table class="table table-striped table-bordered table-hover" style="color:rgb(51,51,51); border-collapse: collapse; margin-bottom: 0px">
			<thead>
				<tr class="info">
					<th>Identificador</th>
					<th>Nombre/Razón Social{{-- Nombre --}}</th>
					<th>Tipo de persona</th>
					<th>Alias</th>
					<th>RFC</th>
					<th>Vendedor </th>
					<th>Operacion</th>
				</tr>
			</thead>

			@foreach($proveedores as $proveedore)
				<tr class="active"
				    title="Has Click Aquì para Ver"
					style="cursor: pointer"
					href="#{{$proveedore->id}}">
					<td>{{$proveedore->id}}</td>
					<td>
						@if ($proveedore->tipopersona == "Fisica")
						{{$proveedore->nombre}} {{ $proveedore->apellidopaterno }} {{ $proveedore->apellidomaterno }}
						@else
						{{$proveedore->razonsocial}}
						@endif
					</td>
					<td>{{ $proveedore->tipopersona }}</td>
					<td>{{ $proveedore->alias }}</td>
					<td>{{ strtoupper($proveedore->rfc) }}</td>
					<td>{{$proveedore->vendedor}}</td>
					<td>
							<a class="btn btn-success btn-sm" href="{{ route('proveedores.show',['proveedor'=>$proveedore]) }}">
								<i class="fa fa-eye" aria-hidden="true"></i> 
								<strong>Ver
							</strong></a>

							<a class="btn btn-info btn-sm" href="{{ route('proveedores.edit',['proveedor'=>$proveedore]) }}">
								
								<i class="fa fa-pencil-square-o" aria-hidden="true"></i> <strong>Editar</strong>
							</a>
				</tr>
				</td>
			</tbody>
		</div>
			@endforeach
		</table>
		<script type="text/javascript" src="{{ asset('js/forms.js') }}"></script>