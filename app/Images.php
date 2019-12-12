<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Images extends Model
{
    use Notifiable;

    protected $table = 'images';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id', 'type', 'path'
    ];

    // public function Producs(){
    //     return $this->hasMany(Products::class, "product_id");
    // }
}
