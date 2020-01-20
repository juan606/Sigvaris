<?php

namespace App\Http\Controllers\Paciente;

use App\Crm;
use App\Estado;
use UxWeb\SweetAlert\SweetAlert as Alert;
use App\Paciente;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\FindCrmRequest;
use Illuminate\Support\Facades\Auth;

class PacienteCrmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (Auth::check()) {
                if (Auth::user()->role->crm) {
                    return $next($request);
                }
                return redirect('/inicio');
            }
            return redirect('/');
        });
    }
    public function index()
    {
        $estados = Estado::get();
        $pacientes = Paciente::get();
        $crms = Crm::get();
        return view('crm.index', ['crms' => $crms, 'pacientes' => $pacientes, 'estados' => $estados]);
    }

    public function indexWithFind(FindCrmRequest $request)
    {
        $crms = Crm::with('paciente');
        if ($request->fechaInicioBusqueda) {
            $crms = $crms->where('fecha_aviso', '>=', $request->fechaInicioBusqueda);
        }

        if ($request->fechaFinBusqueda) {
            $crms = $crms->where('fecha_aviso', '<=', $request->fechaFinBusqueda);
        }

        $crms = $crms->get();

        $estados = Estado::get();
        $pacientes = Paciente::get();

        return view('crm.index', ['crms' => $crms, 'pacientes' => $pacientes, 'estados' => $estados]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$request->input('paciente_id')=$request->input('paciente_id1');
        $crm = Crm::create($request->all());
        if ($crm) {
            Alert::success('Crm registrado subido correctamente.');
            return redirect()->route('crm.index');
        } else {
            Alert::error('Error al registrar crm.');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Crm  $crm
     * @return \Illuminate\Http\Response
     */
    public function show(Crm $crm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Crm  $crm
     * @return \Illuminate\Http\Response
     */
    public function edit(Crm $crm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Crm  $crm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Crm $crm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Crm  $crm
     * @return \Illuminate\Http\Response
     */
    public function destroy(Crm $crm)
    {
        //
    }

    public function getCrmCliente(Paciente $paciente)
    {
        $estados = Estado::get();
        return view('pacientecrm.index', ['paciente' => $paciente, 'estados' => $estados]);
    }
     public function getCrmClienteCrm(Request $request)
    {
        //$pacientes = Paciente::get();
        //var_dump($request->input('id'));
        $crmsCli = Crm::where('paciente_id',$request->input('id'))->get();
        //$estados = Estado::get();
        //dd($crmsCli);
        $tablaUsuario='
        <table class="table table-striped table-bordered table-hover" style="margin-bottom: 0px" id="tablaPacientes">
        <tr class="info">
            <th>Nombre</th>
            <th>Creación</th>
            <th>Fecha Aviso</th>
            <th>Fecha Contacto</th>
            <th>Forma Contacto</th>
            <th>Estado</th>
            <th>Hora</th>
        </tr>';
        foreach ($crmsCli as $cliente) {
            $tablaUsuario.= "<tr class='active tupla' >";
            $tablaUsuario.= "<td >".$request->input('nombre')."</td>"; 
            $tablaUsuario.= "<td >".$cliente['created_at']."</td>";  
            $tablaUsuario.= "<td >".$cliente['fecha_aviso']."</td>";     
            $tablaUsuario.= "<td >".$cliente['fecha_contacto']."</td>";  
            $tablaUsuario.= "<td >".$cliente['forma_contacto']."</td>";
            $tablaUsuario.= "<td >".$cliente->estado['nombre']."</td>";    
            $tablaUsuario.= "<td >".$cliente['hora']."</td>";  
            $tablaUsuario.= "</tr>";
        }
        $tablaUsuario.="</table>";
        return $tablaUsuario;
    }
}
