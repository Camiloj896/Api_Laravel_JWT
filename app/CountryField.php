<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CountryField extends Model
{
    protected $tabla = 'pais_campo';

    protected $fillable = [
        'Pais',
    ];

    // Relacion de Muchos a Muchos
    public function projects(){
        return $this->belongsToMany(Project::class, 'multicountry', 'countryfield_id', 'project_id');        
    }
}
