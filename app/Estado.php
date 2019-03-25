<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $table = 'estados';
    protected $fillable=['id','nombre'];
    protected $hidden=[ 'created_at', 'updated_at','deleted_at'];

    public function crm(){
        return $this->hasMany('App\Crm');
    }
}
