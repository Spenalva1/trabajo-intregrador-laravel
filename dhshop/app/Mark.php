<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    public $table = 'marks';
    public $timestamps = false;
    public $guarded = [];

    public function products(){
        return $this->hasMany('App\Product', 'mark_id');
    }
}
