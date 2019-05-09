<?php

namespace App\Http\Controllers\User;

use App\User;
use App\Role;
use App\Empleado;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use UxWeb\SweetAlert\SweetAlert as Alert;
use DB;
use App\Quotation;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct() {
        $this->middleware(function ($request, $next) {
            if(Auth::check()) {
                if(Auth::user()->role->usuarios)
                {
                    return $next($request);
                }                
             return redirect('/inicio');
                 
            }
            return redirect('/'); 
        });
    }
    public function index()
    {
        $usuarios = User::get();        
        return view('users.index', ['users'=>$usuarios]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::get();
        $empleados=Empleado::get();
        return view('users.create', ['roles'=>$roles,'empleados'=>$empleados]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $invalidarC=0;
        $invalidarN=0;
        $roles = Role::get();
        $empleado=Empleado::find($request->empleado_id);
        if (User::where('email', '=', $empleado->email)->exists()) {
            Alert::error('Porfavor ingrese uno diferente','¡Este empleado ya tiene usuario!');
            return redirect()->route('usuarios.index');
        }
        $usuario = new User;
        //dd($empleado->nombre);
        $usuario->name = $empleado->nombre;
        $usuario->email = $empleado->email;
        $usuario->password = bcrypt($request->password);
        $usuario->role_id = $request->role_id;
        $usuario->empleado_id=$request->empleado_id;
        //dd($usuario);
        $usuario->save();
        return redirect()->route('usuarios.index');        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $usuario)
    {
        
        $roles=Role::get();
        $empleados=Empleado::get();
        return view('users.edit',['user'=>$usuario,'roles'=>$roles]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $usuario)
    {
        $usuario->password = bcrypt($request->password);
        $usuario->role_id = $request->role_id;
        $usuario->save();
        return $this->index();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $usuario)
    {
        //return 'destruido '.$user->name;
        //$temp = User::find($user);
        //return 'entrando a destroy';
        //dd($usuario);
        if($usuario)
        {
            $usuario->delete();
            $usuarios = User::paginate(10);
            return view('users.index', ['users'=>$usuarios]);
        }
        else
            return 'no existe';
    }
}
