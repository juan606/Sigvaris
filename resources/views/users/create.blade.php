@extends('principal')
@section('content')
<div class="container">
    <div class="card" style="display: none;" id="datosNuevoUsuario">
        <form role="form" method="POST" action="{{ route('usuarios.store') }}">
            <div class="card-header">
                <h1>Nuevo Usuario </h1>
            </div>
            <div class="card-body">
                {{ csrf_field() }}
                <div class="row">
                    <div class="form-group col-3">
                        <label class="control-label" for="name"><i class="fa fa-asterisk" aria-hidden="true"></i> Nombre
                            :</label>
                        <select id="empleadoOption" class="custom-select" required name="empleado_id" id="empleado_id" >
                            <option value="" >Seleccionar...</option>                            
                            @foreach ($empleados as $empleado)
                                <option value="{{$empleado->id}}">{{$empleado->nombre}}</option>

                            @endforeach
                        </select>
                    </div>
                    {{-- <div class="form-group col-3">
                        <label class="control-label" for="email"><i class="fa fa-asterisk" aria-hidden="true"></i>
                            Correo :</label>
                        <input type="email" class="form-control" id="email" name="email" readonly="" value="" required autofocus>
                    </div> --}}
                    <div class="form-group col-3">
                        <label class="control-label" for="password"><i class="fa fa-asterisk" aria-hidden="true"></i>
                            Contraseña :</label>
                        <input type="password" class="form-control" id="password" name="password" required autofocus>
                    </div>
                    <div class="form-group col-3">
                        <div class="form-group">
                            <label for="role_id">Rol</label>
                            <select class="form-control" required name="role_id" id="role_id">
                                <option value="">Seleccionar...</option>
                                @foreach($roles as $role)
                                    @if($role->nombre=='Administrador')
                                    @else
                                        <option value="{{$role->id}}">{{$role->nombre}}</option>
                                    @endif
                                
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-muted">
                <button type="submit" class="btn btn-success btn-lg btn-block">
                    <strong>Guardar</strong>
                </button >
            </div>
        </form>
    </div>
    
<br>

    <div class="card">
        <div class="card-header">
            Empleados
        </div>
        <div class="body">
                <table class="table table-hover table-striped table-bordered" style="margin-bottom: 0;" id="listaEmpleados">
                        <thead>
                            <tr class="info">
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Apellido paterno</th>
                                <th>Apellido materno</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($empleados as $key => $empleado)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$empleado->nombre}}</td>
                                    <td>{{$empleado->appaterno}}</td>
                                    <td>{{$empleado->apmaterno}}</td>
                                    <td>
                                        <button type="button" class="btn btn-success btn-crear" id-empleado={{$empleado->id}}>
                                            Crear usuario
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        
                        </table>
        </div>
    </div>
</div>

    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>    
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#listaEmpleados').DataTable();
        } );
    </script>


    <script>
    
    $('.btn-crear').click( function(){
        // alert($(this).attr('id-empleado'));
        const empleado_id = $(this).attr('id-empleado');
        alert(empleado_id);
        $('#empleadoOption').val(empleado_id);

        $('#datosNuevoUsuario').show('slow');

    });
    
    </script>

{{-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="             crossorigin="anonymous"></script> --}}
<script type="text/javascript">
   // $(document).ready(function(){

   //  $("#empleado_id").change(function(){

   //      var id = $(this).children("option:selected").val();

   //      // alert("You have selected the country - " + id);
   //       var id = $(this).children("option:selected").val();
   //     $.ajax({
   //        url: "/emp/"+id,          
   //        success: function( result ) {
   //          $('input[name="email"]').val(result.empleado.email);
   //        },
   //        fail:function(result){
   //          console.log('esta mal '+result);
   //        }
   //      });
        //console.log("emp/"+id);
    //     $.get("emp/"+id, function(data, status){
    //         alert('hola mund');
    //   console.log("Data: " + data + "\nStatus: " + status);
    // });

//     });

// });
   /*
 $(document).ready(function(){

    $("#empleado_id").change(function(){

        var id = $(this).children("option:selected").val();
       $.ajax({
          url: "/emp/"+id,          
          success: function( result ) {
            console.log(result);
          },
          fail:function(result){
            console.log('esta mal '+result);
          }
        });

        

    });

});
   */
</script>
@endsection
