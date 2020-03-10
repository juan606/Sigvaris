@foreach($doctores as $doctor)
   <tr role="row" class="even">
        <td class="sorting_1">{{$doctor->id}}</td>
        <td>{{$doctor->nombre}}</td>
        <td>{{$doctor->apellidopaterno}}</td>
        <td>{{$doctor->apellidomaterno}}</td>
        <td>
            <button type="button" class="btn btn-success asignar" nom="{{ $doctor->nombre." ".$doctor->apellidopaterno." ".$doctor->apellidomaterno }}" id-doctor="{{$doctor->id}}">
                Asignar
            </button>
        </td>
    </tr>                                           
@endforeach