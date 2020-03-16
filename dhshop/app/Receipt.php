<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    public $table = 'receipts';
    public $timestamps = false;
    public $guarded = [];

    public function user(){
        return $this->belongsTo('App\Customer', 'user_id');
    }

    public function products(){
        return $this->belongsToMany('App\Product', 'receiptsProducts', 'receipt_id', 'product_id')->withPivot('quantity');
    }
}
