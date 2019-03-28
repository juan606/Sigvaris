@extends('principal')
@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-6">
                    <h3>Roles</h3>
                </div>
                <div class="col-6">
                    <a class="btn btn-success" href="{{ route('roles.create') }}">
                        <strong><i class="fa fa-plus float-right"></i></strong>
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
           <table class="table">
               <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Ver</th>
                    </tr>
               </thead>
               <tbody>
                    @foreach($roles as $role)
                    <tr>
                        <td>{{$role->nombre}}</td>
                        <td><a href="{{route('roles.show', ['role'=>$role])}}" role="button" class="btn btn-primary"> <strong><i class="fas fa-eye "></i></strong></a></td>
                    </tr>
                    @endforeach
               </tbody>
           </table>
        </div>
    </div>
</div>

@endsection