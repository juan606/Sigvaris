<?php

namespace App\Http\Controllers\Role;

use App\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use UxWeb\SweetAlert\SweetAlert as Alert;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct() {
        $this->middleware(function ($request, $next) {
            if(Auth::check()) {
                if(Auth::user()->role->roles)
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
        return view('roles.index', ['roles'=> Role::get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $perm = $request->permisos;
        $proveedores = false;
        $pacientes = false;
        $doctores = false;
        $recursos_humanos = false;
        $precargas = false;
        $productos = false;
        $punto_de_venta = false;
        $crm = false;
        $oficinas = false;
        $usuarios = false;
        $roles = false;
        if(isset($perm['proveedores'])){
            $proveedores = true;
        }
        if(isset($perm['pacientes'])){
            $pacientes = true;
        }
        if(isset($perm['doctores'])){
            $doctores = true;
        }
        if(isset($perm['recursos_humanos'])){
            $recursos_humanos = true;
        }
        if(isset($perm['precargas'])){
            $precargas = true;
        }
        if(isset($perm['punto_de_venta'])){
            $punto_de_venta = true;
        }
        if(isset($perm['productos'])){
            $productos = true;
        }
        if(isset($perm['crm'])){
            $crm = true;
        }
        if(isset($perm['oficinas'])){
            $oficinas = true;
        }
        if(isset($perm['usuarios'])){
            $usuarios = true;
        }
        if(isset($perm['roles'])){
            $roles = true;
        }
        $role = new Role;
        $role->nombre = $request->nombre;
        $role->proveedores = $proveedores;
        $role->pacientes = $pacientes;
        $role->doctores = $doctores;
        $role->recursos_humanos = $recursos_humanos;
        $role->precargas = $precargas;
        $role->punto_de_venta = $punto_de_venta;
        $role->productos = $productos;
        $role->crm = $crm;
        $role->oficinas = $oficinas;
        $role->usuarios = $usuarios;
        $role->roles = $roles;
        $role->save();
        return redirect()->route('roles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        return view('roles.show', ['role'=>$role]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        return view('roles.edit',['role'=>$role]);    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $perm = $request->permisos;
         $proveedores = false;
        $pacientes = false;
        $doctores = false;
        $recursos_humanos = false;
        $precargas = false;
        $productos = false;
        $punto_de_venta = false;
        $crm = false;
        $oficinas = false;
        $usuarios = false;
        $roles = false;       
        if(isset($perm['proveedores'])){
            $proveedores = true;
        }
        if(isset($perm['pacientes'])){
            $pacientes = true;
        }
        if(isset($perm['doctores'])){
            $doctores = true;
        }
        if(isset($perm['recursos_humanos'])){
            $recursos_humanos = true;
        }
        if(isset($perm['precargas'])){
            $precargas = true;
        }
        if(isset($perm['punto_de_venta'])){
            $punto_de_venta = true;
        }
        if(isset($perm['productos'])){
            $productos = true;
        }
        if(isset($perm['crm'])){
            $crm = true;
        }
        if(isset($perm['oficinas'])){
            $oficinas = true;
        }
        if(isset($perm['usuarios'])){
            $usuarios = true;
        }
        if(isset($perm['roles'])){
            $roles = true;
        }        
        $role->nombre = $request->nombre;
        $role->proveedores = $proveedores;
        $role->pacientes = $pacientes;
        $role->doctores = $doctores;
        $role->recursos_humanos = $recursos_humanos;
        $role->precargas = $precargas;
        $role->punto_de_venta = $punto_de_venta;
        $role->productos = $productos;
        $role->crm = $crm;
        $role->oficinas = $oficinas;
        $role->usuarios = $usuarios;
        $role->roles = $roles;
        $role->save();        
        return $this->index();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        //  
        //return 'borrado';
        //dd($role->user());
        //$temp = Role::find($role->id);
        //dd($temp);
        //dd(Role::has('user')->get());
        //dd($role->user()->exists());
        if($role->user()->exists())
        {
            Alert::error('Primero elimine al usuario que usa este perfil', 'Usuario usando el perfil actual');
            return $this->index();
        }
        Alert::success('Se ha eliminado el rol');        
        $role->delete();
        $roles = Role::paginate(10);
        return view('roles.index', ['roles'=>$roles]);
    }
}
