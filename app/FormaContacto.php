<?php

namespace App;

use App\DatosGeneralesProveedor;
use Illuminate\Database\Eloquent\Model;

class FormaContacto extends Model
{
    //

    protected $table = 'forma_contacto';
    protected $fillable = ['id','nombre', 'etiqueta'];
    protected $hidden =['created_at', 'updated_at','deleted_at'];
    public $sortable = ['id', 'nombre', 'etiqueta'];

    public function datosGen(){
    	return $this->hasOne(DatosGeneralesProveedor::class);
    }
}
