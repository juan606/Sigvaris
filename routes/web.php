<?php

Route::resource('proveedores','Proveedor\ProveedorController');
// Route::resource('proveedores.direccionFiscal','Proveedor\ProveedorDireccionFiscalController');
Route::resource('proveedores.direccionfisica','Proveedor\ProveedorDireccionFisicaController');
Route::resource('proveedores.datosgenerales','Proveedor\ProveedorDatosGeneralesController');
Route::resource('proveedores.contacto','Proveedor\ProveedorContactoController');
Route::resource('proveedores.datosbancarios','Proveedor\ProveedorDatosBancariosController');

Route::resource('doctores','Doctor\DoctorController');
Route::resource('doctores.consultorios','Doctor\DoctorConsultorioController');
Route::resource('doctores.especialidades','Doctor\DoctorEspecialidadController');
Route::resource('doctores.premios','Doctor\DoctorPremioController');

Route::resource('empleados','Empleado\EmpleadoController');
Route::resource('empleados.datoslaborales','Empleado\EmpleadosDatosLabController');
Route::resource('empleados.estudios','Empleado\EmpleadosEstudiosController');
Route::resource('empleados.emergencias','Empleado\EmpleadosEmergenciasController');
Route::resource('empleados.vacaciones','Empleado\EmpleadosVacacionesController');
Route::resource('empleados.faltas','Empleado\EmpleadosFaltasAdministrativasController');
Route::get('getfaltas','Falta\FaltaController@getFaltas');
Route::resource('faltas','Falta\FaltaController', ['except'=>'show']);

Route::resource('pacientes', 'Paciente\PacienteController');
Route::resource('pacientes.tallas', 'Paciente\PacienteTallaController');
Route::resource('pacientes.historial', 'Paciente\PacienteHistorialController');
Route::resource('pacientes.crm', 'Paciente\PacienteCrmController');
Route::resource('pacientes.tutores', 'Paciente\PacienteTutorController');
Route::get('getDoctores','Doctor\DoctorController@getDoctores');

Route::resource('contratos','Precargas\TipoContratoController');

Route::resource('productos', 'Producto\ProductoController');
Route::get('ventasXPaciente', 'Venta\VentaController@indexXPaciente')->name('ventasXPaciente');
Route::resource('ventas', 'Venta\VentaController');
// Route::resource('bajas','Precargas\TipoBajaController');
// Route::get('buscarempleado','Empleado\EmpleadoController@buscar');
// Route::resource('personals', 'Personal\PersonalController');
// Route::resource('personals.datoslaborales', 'Personal\PersonalDatosLabController');
// Route::resource('personals.referenciapersonales', 'Personal\PersonalRefPersonalController');
// Route::resource('personals.datosbeneficiario', 'Personal\PersonalBeneficiarioController');
// Route::resource('personals.producto','Personal\PersonalProductoController');
// Route::resource('personals.products.transactions', 'Personal\PersonalProductTransactionController',['only'=>'store']);
// Route::resource('personals.product','Personal\PersonalProductController', ['only'=>'index']);
Route::get('/', function () {
    return view('index');
});
