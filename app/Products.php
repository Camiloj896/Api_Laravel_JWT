<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use Notifiable;

    protected $table = 'products';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'category_id', 'state_id', 'brand_id', 'talla_id', 'type', 'subcat'
    ];

    public function User(){
        return $this->belongsTo(User::class);
    }

    public function images(){
        return $this->hasMany(Images::class, 'product_id');
    }
}
