<option value="">Seleccionar...</option>
<option value="otro">Otro...</option>
@foreach($doctores as $doctor)
    <option value="{{$doctor->id}}">{{$doctor->nombre.$doctor->paterno.$doctor->materno}}</option>
@endforeach