<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    
    protected $table = 'comentarios';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Comentario', 'Email',
    ];

    // Relacion de uno a mucho inversa (muchos a uno)   
    public function IncidenceScript(){
        return $this->belongsTo(IncidenceScript::class);
    }
}
