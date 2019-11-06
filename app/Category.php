<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $tabla = 'multicategoria';

    protected $fillable = [
        'project_id', 'Mname',
    ];

    // Relacion de uno a muchos
    public function projects(){
        return $this->belongsTo(Project::class);
    }
}
