<?php

Route::resource('provedores','Proveedor\ProveedorController');
Route::resource('provedores.direccionfisica','Proveedor\ProveedorDireccionFisicaController');
Route::resource('provedores.datosgenerales','Proveedor\ProveedorDatosGeneralesController');
Route::resource('provedores.contacto','Proveedor\ProveedorContactoController');
Route::resource('provedores.datosbancarios','Proveedor\ProveedorDatosBancariosController');
Route::resource('doctores','Doctor\DoctorController');
Route::resource('prospecto','Prospecto\ProspectoController');
Route::get('/', function () {
    return view('index');
});
