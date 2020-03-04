<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public $table = 'users';
    public $timestamps = false;
    public $guarded = [];

    public function cart(){
        return $this->belongsToMany('App\Product', 'carts', 'user_id', 'product_id')->withPivot('quantity');
    }
}
