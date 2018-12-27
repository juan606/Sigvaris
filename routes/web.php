<?php

Route::resource('proveedores','Proveedor\ProveedorController');
Route::resource('proveedores.direccionFiscal','Proveedor\ProveedorDireccionFiscalController');
Route::resource('proveedores.direccionfisica','Proveedor\ProveedorDireccionFisicaController');
Route::resource('proveedores.datosgenerales','Proveedor\ProveedorDatosGeneralesController');
Route::resource('proveedores.contacto','Proveedor\ProveedorContactoController');
Route::resource('proveedores.datosbancarios','Proveedor\ProveedorDatosBancariosController');
Route::resource('doctores','Doctor\DoctorController');
Route::resource('prospectos','Prospecto\ProspectoController');
Route::get('/', function () {
    return view('index');
});
