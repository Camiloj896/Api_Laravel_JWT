<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'rol_id', 'manager_id', 'Fname', 'Lname', 'Email', 'Area', 'Pass', 'ForgotPass', 'Cargo', 'Estado',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'Pass', 'remember_token',
    ];

    
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Relacion de Muchos a Muchos
    public function projects(){
        return $this->belongsToMany(Project::class, 'usuario_proyecto', 'user_id', 'project_id');        
    }
}
