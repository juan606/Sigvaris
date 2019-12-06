<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\EmpleadosDatosLab;
use App\Paciente;
use Illuminate\Database\Eloquent\Builder;

class Empleado extends Model
{
    //
    protected $table = 'empleados';

    protected $fillable = [
        'id',
        'nombre',
        'appaterno',
        'apmaterno',
        'rfc',
        'telefono',
        'movil',
        'email',
        'nss',
        'curp',
        'infonavit',
        'fnac',
        'cp',
        'calle',
        'numext',
        'numint',
        'colonia',
        'municipio',
        'estado',
        'calles',
        'referencia',
        'oficina_id',
        'activo',
        'homoclave'
    ];


    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function datosLaborales()
    {
        return $this->hasMany('App\EmpleadosDatosLab');
    }
    public function estudios()
    {
        return $this->hasOne('App\EmpleadosEstudios');
    }
    public function emergencias()
    {
        return $this->hasOne('App\EmpleadosEmergencias');
    }
    public function vacaciones()
    {
        return $this->hasMany('App\EmpleadosVacaciones');
    }
    public function faltasAdmin()
    {
        return $this->hasMany('App\EmpleadosFaltasAdministrativas');
    }

    public function oficina()
    {
        return $this->belongsTo('App\Oficina', 'oficina_id');
    }

    public function baja()
    {
        return $this->hasOne('App/EmpleadoBaja');
    }

    public function user()
    {
        return $this->hasOne('App/User');
    }

    public function ventas()
    {
        return $this->hasMany('App\Venta');
    }

    public function puesto()
    {
        return $this->datosLaborales()
            ->orderBy('id', 'desc')
            ->first()
            ->puesto();
    }

    public function pacientes()
    {
        return Paciente::whereHas('ventas', function (Builder $query) {
            return $query->where('empleado_id', $this->id);
        });
    }

    public function fitterMetas(){
        return $this->hasMany('App\FitterMeta');
    }

    /**
     * Scope methods
     */

    public function scopeNoUsers($query)
    {
        $users_id = User::whereNotNull('empleado_id')->pluck('empleado_id')->all();
        return $query->whereNotIn('id', $users_id);
    }

    public function scopeFitters($query)
    {

        return $query->whereHas('datosLaborales', function (Builder $query) {
            return $query->fitters();
        });

        $idsEmpleadosFitters = Puesto::where('nombre', 'fitter')->first()
            ->EmpleadosDatosLab()->with('empleado')->get()
            ->pluck('empleado')->filter()->unique()
            ->pluck('id')->flatten()->toArray();

        return $query->whereIn('id', $idsEmpleadosFitters);
    }
}
