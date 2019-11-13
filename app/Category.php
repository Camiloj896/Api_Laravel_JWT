<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $tabla = 'categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'project_id', 'Mname',
    ];

    // Relacion de uno a muchos
    public function projects(){
        return $this->belongsTo(Project::class);
    }
}
