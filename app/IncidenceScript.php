<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IncidenceScript extends Model
{
    //FALTA CREAR MIGRACIONAES OJO EL ID TIPO INCDENCIA HACER PRUEBAS
    //CREAR CONTOLADOR INCIDENCIAS
    //TERMINAR CONTROLADOR PROYECTOS ACTUALIZAR Y MOSTRAR
    //TERMINAR CONTROLADOR USUARIOS ACTUALIZAR Y MOSTRAR
    protected $tabla = 'incidencias_script';

    protected $fillable = [
        'project_id', 'tincidenceScript_id', 'Ver_Material', 'Ver_Script', 'Pregunta', 'Acepta_RDM', 'Acepta_LDC', 'NoCambio', 'fecha_Live',
    ];

    // Relacion de Muchos a Muchos
    public function comments(){
        return $this->hasMany(Category::class,"Comment_id");        
    }
}
