<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class M_pemain extends Model
{
    //

    use SoftDeletes;

    protected $table = "m_pemain";

    public function M_tim(){
        return $this->BelongsTo('App\M_tim',"id_tim");
    }

    public function M_score(){
        return $this->hasMany('App\M_score',"id_pemain");
    }

    public function M_posisi(){
        return $this->BelongsTo('App\M_posisi',"posisi");
    }
}
