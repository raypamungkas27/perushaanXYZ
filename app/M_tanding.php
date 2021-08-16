<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class M_tanding extends Model
{
    //

    protected $table = "m_tanding";

    public function M_tim_kandang(){
        return $this->BelongsTo('App\M_tim',"tim_kandang");
    }

    public function M_tim_tandang(){
        return $this->BelongsTo('App\M_tim',"tim_tandang");
    }

    public function M_score(){
        return $this->hasMany('App\M_score',"id_tanding");
    }


}
