<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    
    protected $table = 'comentarios';

    // Relacion de uno a mucho inversa (muchos a uno)   
    public function category(){
        return $this->belongsTo(IncidenceScript::class);
    }
}
