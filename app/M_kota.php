<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class M_kota extends Model
{
    //

    protected $table = "regencies";

    public function M_tim(){
        return $this->hasMany('App\M_tim',"id_kota");
    }
}
