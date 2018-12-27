<?php

Route::resource('proveedores','Proveedor\ProveedorController');
Route::resource('proveedores.direccionFiscal','Proveedor\ProveedorDireccionFiscalController');
Route::resource('provedores.direccionFisica','Proveedor\ProveedorDireccionFisicaController');
Route::resource('proveedores.datosGenerales','Proveedor\ProveedorDatosGeneralesController');
Route::resource('proveedores.contacto','Proveedor\ProveedorContactoController');
Route::resource('proveedores.datosBancarios','Proveedor\ProveedorDatosBancariosController');
Route::resource('doctores','Doctor\DoctorController');
Route::resource('prospectos','Prospecto\ProspectoController');
Route::get('/', function () {
    return view('index');
});
