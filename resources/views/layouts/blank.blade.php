<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}"> 
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        
        <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
        <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('bootstrap-toggle/css/bootstrap-toggle.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css')}}">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/forms.css') }}">
        <!-- Optional theme -->
        <link rel="stylesheet" href="{{ asset('css/sweetalert.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
        <!-- Latest compiled and minified JavaScript -->
        
        {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> --}}


         <!-- Custom Fonts -->
        <link href="{{asset('font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
         {{-- <link rel="stylesheet" href="{{ asset('css/main.js') }}"> --}}
        
         <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
         <script src="{{ asset('js/peticion.js') }}"></script>
         
         

    </head>
<body>
        @yield('content')
        


    <!-- Scripts -->
    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="{{ asset('js/peticion.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/forms.js') }}"></script>
     @yield('scripts')
    <script src="{{ asset('js/sweetalert.js') }}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    <script src="{{ asset('bootstrap-toggle/js/bootstrap-toggle.js') }}"></script>
    {{-- Include this after the sweet alert js file --}}
    @include('sweet::alert')
    <script type="https://unpkg.com/sweetalert/dist/main.js"></script>
    {{-- ¿Por qué usamos JQUERY 2.2.2 Y 3.2.1?--}}

   
<script>
        
        $(document).ready(function(){
            
//              $("#precio").keyup(function(){
                
//                 var precio=document.getElementById("precio").value;
                
//                 var ajuste=Number(precio)*Number(cambio);
                
//                 document.getElementById('ajuste').value = ajuste;
//              });
// //----------------------------------------------


$("#atributo_1").change(function(){
      document.getElementById('descripcion_div').style.display = 'block';
      document.getElementById('medidas_div').style.display = 'none';
      
});
$("#atributo_2").change(function(){
      document.getElementById('descripcion_div').style.display = 'none';
      document.getElementById('medidas_div').style.display = 'block';
      
});

//---------------------------------------------------------------------------------------


//-----------------------------------------------------
 $(":text").keyup(function(){
   var lowe=$(this).val();
   $(this).val(lowe.toUpperCase());
    }); 
//*********************************************************************************************
});
function montaje(valor){
   $(document).ready(function(){
//----------------------------------------------------------
var producto='precio_'+valor+'_sel';
var prod='precio_'+valor;
var clave=valor+'_sel';
var clav='clave_'+valor;
document.getElementById(producto).value='$'+document.getElementById(prod).value;
document.getElementById(clave).value=document.getElementById(clav).value;
   });
  
}

$( ":input" ).keyup(function() {
  $("#clave_montaje").val(
    ($("#montaje_descripcion").val()+
    $("#color_montaje").val()+
    $("#espesor_montaje").val()+
    $("#ancho_montaje").val()+"x"+
    $("#alto_montaje").val()).toUpperCase()
  );
});
  

    $('#descripcion_sel').change(function(){
        $("#montaje_descripcion").val($("#descripcion_sel").val());
        $("#nombreh").text($("#descripcion_sel").val());
    });
///****************************************************************
   function save(){
     
var ajax=new XMLHttpRequest();
var colgadera=$('#colgadera').val();
var proveedor=$('#proveedor').val();
var precio=$('#precio').val();
var atributo_c=$('#atributo_c').val();

    if(colgadera==null||colgadera==''||proveedor==null||proveedor==''||precio==null||precio==''){

      alert('Por favor llene todos los campos');
    }else{
      ajax.onreadystatechange=function(){
              if (this.readyState == 4 && this.status == 200) {
            document.getElementById("table_colgaderas").innerHTML = this.responseText;
          }
      };

     ajax.open("GET","/clip_taller/save_gen?colgadera="  + colgadera + "&proveedor=" + proveedor + "&precio=" + precio + "&atributo_c=" + atributo_c , true);
     //  "{{ url('/save_gen') }}?colgadera="
     ajax.send();
                   
    }

}
//------------------------------------------------------------------------------
   function saveA(){
     
var ajax=new XMLHttpRequest();
var adhesivo=$('#adhesivo').val();
var proveedor=$('#proveedor_a').val();
var precio=$('#precio_a').val();
var atributo_a=$('#atributo_a').val();



    if(adhesivo==null||adhesivo==''||proveedor==null||proveedor==''||precio==null||precio==''){

      alert('Por favor llene todos los campos');
    }else{
      ajax.onreadystatechange=function(){
              if (this.readyState == 4 && this.status == 200) {
            document.getElementById("table_adhesivos").innerHTML = this.responseText;
          }
      };

     ajax.open("GET","/clip_taller/save_gen?adhesivo="  + adhesivo + "&proveedor=" + proveedor + "&precio=" + precio + "&atributo_a=" + atributo_a , true);
     //  // "{{ url('/save_gen') }}?adhesivo="
     ajax.send();
    }

}
    </script>
</body>
</html>
