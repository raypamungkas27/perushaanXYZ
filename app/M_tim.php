<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class M_tim extends Model
{
    use SoftDeletes;    
    
    protected $table = "m_tim";

    public function M_kota(){
        return $this->BelongsTo('App\M_kota',"id_kota");
    }

    public function M_pemain(){
        return $this->hasMany('App\M_pemain',"id_tim");
    }

    public function M_tanding_kandang(){
        return $this->hasMany('App\M_tanding',"tim_kandang");
    }
    public function M_tanding_tandang(){
        return $this->hasMany('App\M_tanding',"tim_tandang");
    }


}
