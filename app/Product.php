<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

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
        return $this->hasMany(Image::class, 'product_id');
    }
}
