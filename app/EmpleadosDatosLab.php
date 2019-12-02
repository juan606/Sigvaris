<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class EmpleadosDatosLab extends Model
{

    protected $table = 'empleadosdatoslab';

    protected $fillable = [
        'id',
        'empleado_id',
        'fechacontratacion',
        'fechaactualizacion',
        'contrato_id',
        'salarionom',
        'salariodia',
        'periodopaga',
        'prestaciones',
        'regimen',
        'hentrada',
        'hsalida',
        'hcomida',
        'banco',
        'cuenta',
        'clabe',
        'fechabaja',
        'tipobaja_id',
        'comentariobaja',
        'bonopuntualidad',
        'area_id',
        'puesto_id',
    ];

    protected $hidden = ['created_at', 'updated_at'];


    public function empleado()
    {
        return $this->belongsTo('App\Empleado', 'empleado_id');
    }

    public function tipocontrato()
    {
        return $this->hasOne('App\TipoContrato', 'contrato_id');
    }

    public function tipobaja()
    {
        return $this->hasOne('App\TipoBaja', 'tipobaja_id');
    }

    public function areas()
    {
        return $this->hasOne('App\Area', 'area_id');
    }

    public function puesto()
    {
        return $this->belongsTo('App\Puesto');
    }

    public function scopeFitters($query){
        return $query->whereHas('puesto',function(Builder $query){
            return $query->where('nombre','fitter');
        });
    }
}
