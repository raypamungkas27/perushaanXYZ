<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class M_posisi extends Model
{
    //

    protected $table = "posisi_pemain";

    public function M_pemain(){
        return $this->hasMany('App\M_pemain',"posisi");
    }
}
