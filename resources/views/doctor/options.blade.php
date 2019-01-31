@foreach($doctores as $doctor)
    <option value="{{$doctor->id}}">{{$doctor->nombre.$doctor->paterno.$doctor->materno}}</option>
@endforeach