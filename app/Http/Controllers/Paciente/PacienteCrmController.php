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

        $crms = Crm::where('fecha_aviso','>=',$request->fechaInicioBusqueda)
            ->where('fecha_aviso','<=',$request->fechaFinBusqueda)
            ->with('paciente')
            ->get();

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
}
