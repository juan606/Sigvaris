<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Talla extends Model
{
    protected $table = 'tallas';
    public $timestamps = true;
    
    protected $fillable = [
        'id',
        'pierna',
        'brazo',

        //Pierna

            //Estilos
            'tobimedia',
            'media',
            'pantimedia',
            'calcetin',
            'pantorrillera',

            //Medidas
            'circunferencia_tobillo_izq',
            'circunferencia_tobillo_dcha',
            'circunferencia_pantorrilla_izq',
            'circunferencia_pantorrilla_dcha',
            'altura_pantorrilla_izq',
            'altura_pantorrilla_dcha',
            'circunferencia_muslo_izq',
            'circunferencia_muslo_dcha',
            'altura_pierna_izq',
            'altura_pierna_dcha',
            'circunferencia_cadera',
            'calzado_izq',
            'calzado_dcha',
            'peso',
            'estatura',


        //Brazo
        
            //Estilos
            'guante',

            //Medidas
            'circunferencia_plama_izq',
            'circunferencia_plama_dcha',
            'circunferencia_munieca_izq',
            'circunferencia_munieca_dcha',
            'circunferencia_media_izq',
            'circunferencia_media_dcha',
            'talla_izq',
            'talla_dcha',

        'sexo',
        'paciente_id'
    ];

    public function paciente(){
        return $this->belongsTo(Paciente::class,'paciente_id');
    }
}
