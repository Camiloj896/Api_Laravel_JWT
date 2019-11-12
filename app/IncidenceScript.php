<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IncidenceScript extends Model
{
    protected $tabla = 'incidence_scripts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'project_id', 'tincidenceScript_id', 'cincidenceScript_id', 'Ver_Material', 'Ver_Script', 'Pregunta', 'Acepta_RDM', 'Acepta_LDC', 'NoCambio',
    ];

    // Relacion de Muchos a Muchos
    public function comments(){
        return $this->hasMany(Category::class,"Comment_id");        
    }
}
