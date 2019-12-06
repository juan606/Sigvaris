<?php

namespace App\Http\Controllers\Empleado;

use App\EmpleadosDatosLab;
use App\Empleado;
use App\Area;
use App\Puesto;
use App\Oficina;
use App\Sucursal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class EmpleadoController extends Controller
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
                if (Auth::user()->role->recursos_humanos) {
                    return $next($request);
                }
                return redirect('/inicio');
            }
            return redirect('/');
        });
    }
    public function index(Request $request)
    {
        $busqueda = $request->search;
        if ($busqueda) {
            $palabras_busqueda = explode(" ", $busqueda);
            $empleados = Empleado::where(function ($query) use ($palabras_busqueda) {

                foreach ($palabras_busqueda as $palabra) {
                    $query->where('nombre', 'like', "%$palabra%")->orWhere('appaterno', 'like', "%$palabra%")->orWhere('apmaterno', 'like', "%$palabra%");
                }
            })->paginate(10);
        } else
            $empleados = Empleado::get();
        return view('empleado.index', ['empleados' => $empleados]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $oficinas = Oficina::get();
        $empleado = new Empleado();
        $edit = false;
        return view('empleado.create', ['empleado' => $empleado, 'edit' => $edit, 'oficinas' => $oficinas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->input());

        $otro_rfc = Empleado::where('rfc', $request->input('rfc'))->first();
        $otro_email = Empleado::where('email', $request->input('email'))->first();

        if ($otro_rfc) {
            return redirect()->back()->with('error', 'El rfc ingresado ya existe.');
        }

        if ($otro_email) {
            return redirect()->back()->with('error', 'El email ingresado ya existe.');
        }

        $empleado = Empleado::create($request->all());
        return redirect()->route('empleados.show', ['empleado' => $empleado])->with('success', 'Empleado Creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado)
    {

        return view('empleado.view', ['empleado' => $empleado]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit(Empleado $empleado)
    {
        //
        $oficinas = Oficina::get();
        $edit = true;
        return view('empleado.create', ['empleado' => $empleado, 'edit' => $edit, 'oficinas' => $oficinas]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empleado $empleado)
    {
        //
        $empleado->update($request->all());
        return redirect()->route('empleados.show', ['empleado' => $empleado])->with('success', 'Empleado Actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empleado $empleado)
    {
        //
    }

    //Añadido : Iyari 05/Dic/2017
    public function consulta()
    {
        return view('empleado.consulta');
    }

    public function buscar(Request $request)
    {

        $query = $request->input('busqueda');
        $wordsquery = explode(' ', $query);
        $empleados = Empleado::where(function ($q) use ($wordsquery) {
            foreach ($wordsquery as $word) {
                $q->orWhere('nombre', 'LIKE',      "%$word%")
                    ->orWhere('appaterno', 'LIKE', "%$word%")
                    ->orWhere('apmaterno', 'LIKE', "%$word%")
                    ->orWhere('rfc', 'LIKE',     "%$word%");
            }
        })->get();
        return view('empleado.busqueda', ['empleados' => $empleados]);
    }

    public function getEmpleado($id)
    {
        $empleado = Empleado::find($id);
        return response()->json(['empleado' => $empleado], 200);
    }

    public function getEmpleadosFitters()
    {
        $puestoFitterId = Puesto::where('nombre', 'fitter')
            ->first()
            ->id;

        $empleadosFitter = EmpleadosDatosLab::where('puesto_id', $puestoFitterId)
            ->with('empleado')
            ->get()
            ->pluck('empleado')
            ->unique();

        return response()->json($empleadosFitter, 200);
    }

    public function getEmpleadosFittersByOficina($id)
    {
        $empleadosFitters = Empleado::fitters()
            ->where('oficina_id', $id)
            ->get();
            
        return response()->json($empleadosFitters, 200);
    }
}
