<?php

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/', function () {
	$oficinas=App\Oficina::get();
    return view('auth.login',['oficinas'=>$oficinas]);
});

Route::get('/expedientes/{pacientes}/{file}', function ($pacientes, $file) {
    return Storage::response("public/expedientes/$pacientes/$file");
});
Route::resource('pacientes.expediente','Paciente\PacienteExpedienteController');
Route::resource('pacientes.datos_fiscales','Paciente\PacienteDatosFiscalesController');

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
Route::resource('empleados.faltasDH','Empleado\EmpleadosfaltasDHController');
Route::post('empleados/faltas/actualizar','Empleado\EmpleadoFaltaController@actualizar')->name('empleados.faltas.actualizar');
Route::resource('empleados.permisos','Empleado\EmpleadospermisosController');
Route::resource('empleados.faltas','Empleado\EmpleadosFaltasAdministrativasController');

Route::get('vacaciones','Empleado\EmpleadosVacacionesController@indexVacaciones')->name('vacaciones');
Route::get('permisosFaltas','Empleado\EmpleadosVacacionesController@indexPermisosFaltas')->name('PermisosFaltas');
// METAS
Route::resource('metas','MetaController');

// CERTIFICACIONES
route::resource('empleados.certificaciones', 'Empleado\CertificacionController');
route::resource('oficinas.certificaciones', 'Oficina\CertificacionController');


Route::get('empleados/{empleado}/EmpledoBaja','Empleado\EmpleadoBajaController@create');
Route::post('empleados/{empleado}/EmpledoBaja/store','Empleado\EmpleadoBajaController@store');
Route::post('newVacaciones','Empleado\EmpleadosVacacionesController@storeVacaciones')->name("newVacaciones");
Route::post('SerchEmpleado','Empleado\EmpleadoController@SerchEmpleado');
Route::post('getCurso_Personas','Empleado\EmpleadosEstudiosController@getCurso_Personas');


Route::get('getfaltas','Falta\FaltaController@getFaltas');
Route::resource('faltas','Falta\FaltaController', ['except'=>'show']);
Route::resource('niveles', 'Nivel\NivelController');


Route::post('getPacientes_nombre','Paciente\PacienteController@getPacienteNombre');
//Route::post('crms/index', 'Paciente\PacienteCrmController@indexWithFind')->name('crms.indexWithFind');

Route::resource('pacientes', 'Paciente\PacienteController');
// Route::get('pacientes','Paciente\PacienteController@index');
Route::resource('pacientes.tallas', 'Paciente\PacienteTallaController');
Route::resource('crm', 'Paciente\PacienteCrmController');
//Route::get('crm/index', 'Paciente\PacienteCrmController@index')->name('crm.index');
Route::post('crm_especifico','Paciente\PacienteCrmController@getCrm')->name('crm_especifico');
Route::post('crm.storePaciente','Paciente\PacienteCrmController@storePaciente')->name('crm.storePaciente');

Route::get('pacientes/{paciente}/crm', 'Paciente\PacienteCrmController@getCrmCliente')->name('getCrmsPorCliente');
Route::resource('pacientes.tutores', 'Paciente\PacienteTutorController');
Route::get('getDoctores','Doctor\DoctorController@getDoctores');
Route::get('getDoctoresTable','Doctor\DoctorController@getDoctoresTable');
Route::post('getTabla_modalidad', 'Paciente\PacienteCrmController@getCrmClienteCrm')->name('getTabla_modalidad');
Route::post('getTabla_modalidad_ventas', 'Paciente\PacienteCrmController@getTabla_modalidad_ventas')->name('getTabla_modalidad_ventas');
//FACTURAS
Route::resource('facturas','Paciente\FacturaController');
Route::post('facturas.download', 'Paciente\FacturaController@download')->name('facturas.download');
Route::get('ventas_from/{paciente}','Paciente\FacturaController@getVentas');
Route::get('get_paciente/{paciente}','Paciente\FacturaController@getPaciente');
Route::get('get_promos/{descuento}','Venta\DescuentoController@getPromos');
Route::post('calcular_descuento/{promocion}','Venta\DescuentoController@getDescuento');
Route::get('obtener_sigpesos/{paciente}','Venta\DescuentoController@getSigpesos');

Route::get('productos/inventario', 'Inventario\InventarioController@index')->name('productos.inventario');
Route::get('productos/inventario/historial', 'Inventario\InventarioController@historial')->name('productos.inventario.historial');
Route::get('productos/inventario/modificar/{id}', 'Inventario\InventarioController@edit')->name('producto.inventario.modificar');
Route::post('productos/inventario/update', 'Inventario\InventarioController@update')->name('producto.inventario.update');
Route::resource('contratos','Precargas\TipoContratoController')->middleware('precargas.role');
Route::resource('descuentos', 'Venta\DescuentoController')->middleware('productos.rol');
Route::resource('productos', 'Producto\ProductoController')->middleware('productos.rol');



Route::post('ventas/getProductos_nombre','Producto\ProductoController@getProductosNombre')->name('ventas/getProductos_nombre');
Route::post('pacientes/{id}/getProductos_nombre','Producto\ProductoController@getProductosNombre');
Route::post('productos/getProductoExists','Producto\ProductoController@getProductoExists')->name('productos/getProductoExists');

Route::get('import-export-csv-excel', array('as' => 'excel.import', 'uses' => 'FileController@importExportExcelORCSV'))->middleware('productos.rol');
Route::post('import-csv-excel', array('as' => 'import-csv-excel', 'uses' => 'FileController@importFileIntoDB'))->middleware('productos.rol');
Route::get('download-excel-file/{type}', array('as' => 'excel-file', 'uses' => 'FileController@downloadExcelFile'))->middleware('productos.rol');



Route::get('pacientes/{paciente}/ventas/historial', 'Venta\VentaController@indexConPaciente')->name('pacientes.historial');
Route::get('pacientes/{paciente}/ventas', 'Venta\VentaController@createConPaciente')->name('pacientes.venta');

Route::post('get_ventas','Venta\VentaController@getVentas');
Route::post('get-ventas-clientes','Venta\VentaController@getVentasClientes');
Route::get('corte-caja/export', 'CorteCaja\CorteCajaController@export')->name('corte-caja.export');
Route::resource('corte-caja', 'CorteCaja\CorteCajaController');
Route::resource('ventas.cambio-fisico', 'Venta\CambioFisicoController');
Route::resource('ventas.damage-oot', 'Venta\DamageOOTController');
Route::resource('ventas.devoluciones', 'Venta\DevolucionController');
Route::resource('ventas', 'Venta\VentaController');


Route::resource('hospitals', 'Hospital\HospitalController');
Route::resource('estados', 'Estado\EstadoController');
Route::resource('oficinas', 'Oficina\OficinaController');
Route::resource('giros', 'Giro\GiroController', ['except' => 'show']);
Route::resource('areas','Area\AreaController', ['except'=>'show']);
Route::resource('puestos','Puesto\PuestoController', ['except'=>'show']);
Route::resource('bancos','Banco\BancoController', ['except'=>'show']);
Route::resource('bajas','Precargas\TipoBajaController')->middleware('precargas.role');

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

Route::get('reportes/4d','Reporte\ReporteController@cuatrod')->name('reportes.4d');
Route::post('reportes/4d','Reporte\ReporteController@cuatrod')->name('reportes.4d');

Route::get('reportes/5','Reporte\ReporteController@cinco')->name('reportes.5');
Route::post('reportes/5','Reporte\ReporteController@cinco')->name('reportes.5');

Route::get('reportes/9','Reporte\ReporteController@nueve')->name('reportes.9');
Route::post('reportes/9','Reporte\ReporteController@nueve')->name('reportes.9');

Route::get('reportes/10','Reporte\ReporteController@diez')->name('reportes.10');
Route::post('reportes/10','Reporte\ReporteController@diez')->name('reportes.10');

Route::get('reportes/11','Reporte\ReporteController@once')->name('reportes.11');


Route::get('reportes/2','Reporte\ReporteController@dos')->name('reportes.2');
Route::post('reportes/2','Reporte\ReporteController@dos')->name('reportes.2');
Route::get('reportes/4','Reporte\ReporteController@cuatro')->name('reportes.4');
Route::post('reportes/4','Reporte\ReporteController@cuatro')->name('reportes.4');
Route::get('reportes/7','Reporte\ReporteController@siete')->name('reportes.7');
Route::get('reportes/metas','Reporte\ReporteController@reporteVentasfitter')->name('reportes.metas');
Route::post('reportes/metas','Reporte\ReporteController@reporteVentasfitter')->name('reportes.metas');

//Productos con daño
Route::get('ventas/{id}/damage','Venta\DamageController@index');
Route::post('SerchProductoExit','Venta\DamageController@SerchProductoExit');
Route::post('Devolucion_Damage','Venta\DamageController@Devolucion_Damage');


Route::get('pruebas','Prueba\PruebaController@index');
Route::get('pruebasJC','Prueba\PruebaController@CrmVentasTotales');


// APIS
Route::get('api/empleados/fitters/','Empleado\EmpleadoController@getEmpleadosFitters');
Route::get('api/empleados/fitters/{oficina}','Empleado\EmpleadoController@getEmpleadosFittersByOficina');