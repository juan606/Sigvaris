<?php

namespace App\Http\Controllers\Proveedor;

use App\DatosBancariosProveedor;
use App\Proveedor;
use App\Banco;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProveedorDatosBancariosController extends Controller
{
    public function index(Proveedor $proveedore)
    {
        $bancario = $proveedore->datosBancarios;
        if(!$bancario) {
            $bancos = Banco::get();
            return view('proveedores.bancarios.create', ['proveedore' => $proveedore, 'bancos' => $bancos]);
        }
        return view('proveedores.bancarios.view', ['proveedore' => $proveedore, 'bancario' => $bancario]);
    }

    public function create(Proveedor $proveedore)
    {
        $bancos = Banco::get();
        return view('proveedores.bancarios.create', ['proveedore' => $proveedore, 'bancos' => $bancos]);
    }

    public function store(Request $request, Proveedor $proveedore)
    {
        $bancario = new DatosBancariosProveedor();
        $bancario->banco_id = $request->banco_id;
        $bancario->proveedor_id = $proveedore->id;
        $bancario->cuenta = $request->cuenta;
        $bancario->clabe = $request->clabe;
        $bancario->beneficiario = $request->beneficiario;
        $bancario->save();
        return view('proveedores.bancarios.view', ['proveedore' => $proveedore, 'bancario' => $bancario]);
    }

    public function view() {

    }

    public function edit(Proveedor $proveedore)
    {
        $bancario = $proveedore->datosBancarios;
        $bancos = Banco::get();
        return view('proveedores.bancarios.edit', ['proveedore' => $proveedore, 'bancario' => $bancario, 'bancos' => $bancos]);
    }

    public function update(Request $request, Proveedor $proveedore)
    {
        $bancario = $proveedore->datosBancarios;
        $bancario->update($request->all());
        return $this->index($proveedore);
    }

    public function destroy() {

    }
}
