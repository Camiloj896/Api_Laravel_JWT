<?php

namespace App;

use Illuminate\Notifications\Notifiable;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use Notifiable;

    protected $table = 'projects';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pcomision_id', 'metodologia_id', 'solucion_id', 'plataforma_id', 'estatus_id', 'tipore_id', 'fentrega_id', 'Jobnumber', 'Jobnumber_LDCG', 'Pname', 'Cliente', 'KantarProject', 'Link_KP', 'Qlib_uso', 'Qlib_Link', 'Qlib_NA', 'Qlib_Metadata', 'Qlib_porqueM', 'Qlib_Web', 'Qlib_porqueW',
    ];

    // Relacion de Muchos a Muchos
    public function users(){
        return $this->belongsToMany(User::class, 'usuario_proyecto', 'project_id', 'user_id');        
    }

    
}
