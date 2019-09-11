<?php

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/', function () {
	$oficinas=App\Oficina::get();
    return view('auth.login',['oficinas'=>$oficinas]);
});

Route::get('inicio', 'InicioController@index')->name('inicio');
// Route::get('/login', function(){echo
// "hello"});
Route::post('login', 'Auth\LoginController@login')->name('login');

Route::get('logout', 'Auth\LoginController@logout');

Route::resource('proveedores','Proveedor\ProveedorController');
Route::resource('proveedores.direccionfisica','Proveedor\ProveedorDireccionFisicaController');
Route::resource('proveedores.datosgenerales','Proveedor\ProveedorDatosGeneralesController');
Route::resource('proveedores.contacto','Proveedor\ProveedorContactoController');
Route::resource('proveedores.datosbancarios','Proveedor\ProveedorDatosBancariosController');

Route::resource('doctores','Doctor\DoctorController');
Route::get('doctores/i','Doctor\DoctorController@index');
Route::delete('doctores/{doctor}/Borrar','Doctor\DoctorController@borrar');
Route::resource('doctores.consultorios','Doctor\DoctorConsultorioController');
Route::resource('doctores.especialidades','Doctor\DoctorEspecialidadController');
Route::resource('doctores.premios','Doctor\DoctorPremioController');
Route::get('doctores.pacientes/{doctor}','Doctor\DoctorPacienteController@getPacientes')->name('doctor.pacientes');

Route::resource('empleados','Empleado\EmpleadoController');
Route::resource('empleados.datoslaborales','Empleado\EmpleadosDatosLabController');
Route::resource('empleados.estudios','Empleado\EmpleadosEstudiosController');
Route::resource('empleados.emergencias','Empleado\EmpleadosEmergenciasController');
Route::resource('empleados.vacaciones','Empleado\EmpleadosVacacionesController');
Route::resource('empleados.faltas','Empleado\EmpleadosFaltasAdministrativasController');

Route::get('empleados/{empleado}/EmpledoBaja','Empleado\EmpleadoBajaController@create');
Route::post('empleados/{empleado}/EmpledoBaja/store','Empleado\EmpleadoBajaController@store');

Route::get('getfaltas','Falta\FaltaController@getFaltas');
Route::resource('faltas','Falta\FaltaController', ['except'=>'show']);
Route::resource('niveles', 'Nivel\NivelController');

Route::resource('pacientes', 'Paciente\PacienteController');
// Route::get('pacientes','Paciente\PacienteController@index');
Route::resource('pacientes.tallas', 'Paciente\PacienteTallaController');
Route::resource('crm', 'Paciente\PacienteCrmController');
Route::get('pacientes/{paciente}/crm', 'Paciente\PacienteCrmController@getCrmCliente')->name('getCrmsPorCliente');
Route::resource('pacientes.tutores', 'Paciente\PacienteTutorController');
Route::get('getDoctores','Doctor\DoctorController@getDoctores');

//FACTURAS
Route::resource('facturas','Paciente\FacturaController');
Route::get('ventas_from/{paciente}','Paciente\FacturaController@getVentas');
Route::get('get_paciente/{paciente}','Paciente\FacturaController@getPaciente');
Route::get('get_promos/{descuento}','Venta\DescuentoController@getPromos');
Route::post('calcular_descuento/{promocion}','Venta\DescuentoController@getDescuento');
Route::get('obtener_sigpesos/{paciente}','Venta\DescuentoController@getSigpesos');

Route::resource('contratos','Precargas\TipoContratoController');
Route::resource('descuentos', 'Venta\DescuentoController');
Route::resource('productos', 'Producto\ProductoController');
Route::get('import-export-csv-excel', array('as' => 'excel.import', 'uses' => 'FileController@importExportExcelORCSV'));
Route::post('import-csv-excel', array('as' => 'import-csv-excel', 'uses' => 'FileController@importFileIntoDB'));
Route::get('download-excel-file/{type}', array('as' => 'excel-file', 'uses' => 'FileController@downloadExcelFile'));

Route::get('pacientes/{paciente}/ventas/historial', 'Venta\VentaController@indexConPaciente')->name('pacientes.historial');
Route::get('pacientes/{paciente}/ventas', 'Venta\VentaController@createConPaciente')->name('pacientes.venta');

Route::post('get_ventas','Venta\VentaController@getVentas');
Route::post('get-ventas-clientes','Venta\VentaController@getVentasClientes');
Route::resource('ventas', 'Venta\VentaController');


Route::resource('hospitals', 'Hospital\HospitalController');
Route::resource('estados', 'Estado\EstadoController');
Route::resource('oficinas', 'Oficina\OficinaController');
Route::resource('giros', 'Giro\GiroController', ['except' => 'show']);
Route::resource('areas','Area\AreaController', ['except'=>'show']);
Route::resource('puestos','Puesto\PuestoController', ['except'=>'show']);
Route::resource('bancos','Banco\BancoController', ['except'=>'show']);
Route::resource('bajas','Precargas\TipoBajaController');

Route::resource('roles','Role\RoleController');
//Route::get('roles/{role}/destroy','Role\RoleController@destroy');
Route::resource('usuarios','User\UserController');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/pembayaran/print', 'PembayaranController@print')->name('pembayaran.print');
Route::post('receipt/print','ReceiptController@printReceipt');
Route::get('emp/{id}','Empleado\EmpleadoController@getEmpleado');


// Reportes
Route::get('reportes/1','Reporte\ReporteController@uno')->name('reportes.1');
Route::post('reportes/1','Reporte\ReporteController@uno')->name('reportes.1');

Route::get('reportes/2','Reporte\ReporteController@dos')->name('reportes.2');
Route::post('reportes/2','Reporte\ReporteController@dos')->name('reportes.2');

Route::get('reportes/3','Reporte\ReporteController@tres')->name('reportes.3');
Route::post('reportes/3','Reporte\ReporteController@tres')->name('reportes.3');

Route::get('reportes/4a','Reporte\ReporteController@cuatroa')->name('reportes.4a');
Route::post('reportes/4a','Reporte\ReporteController@cuatroa')->name('reportes.4a');

Route::get('reportes/4b','Reporte\ReporteController@cuatrob')->name('reportes.4b');
Route::post('reportes/4b','Reporte\ReporteController@cuatrob')->name('reportes.4b');

Route::get('reportes/4c','Reporte\ReporteController@cuatroc')->name('reportes.4c');
Route::post('reportes/4c','Reporte\ReporteController@cuatroc')->name('reportes.4c');

Route::get('reportes/5','Reporte\ReporteController@cinco')->name('reportes.5');
Route::post('reportes/5','Reporte\ReporteController@cinco')->name('reportes.5');

Route::get('reportes/9','Reporte\ReporteController@nueve')->name('reportes.9');
Route::post('reportes/9','Reporte\ReporteController@nueve')->name('reportes.9');

Route::get('reportes/10','Reporte\ReporteController@diez')->name('reportes.10');
Route::post('reportes/10','Reporte\ReporteController@diez')->name('reportes.10');

Route::get('reportes/2','Reporte\ReporteController@dos')->name('reportes.2');
Route::post('reportes/2','Reporte\ReporteController@dos')->name('reportes.2');
Route::get('reportes/4','Reporte\ReporteController@cuatro')->name('reportes.4');
Route::post('reportes/4','Reporte\ReporteController@cuatro')->name('reportes.4');
Route::get('reportes/7','Reporte\ReporteController@siete')->name('reportes.7');



Route::get('pruebas','Prueba\PruebaController@index');