<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class M_score extends Model
{
    //

    protected $table = "m_score";

    public function M_tanding(){
        return $this->BelongsTo('App\M_tanding',"id_tanding");
    }

    public function M_pemain(){
        return $this->BelongsTo('App\M_pemain',"id_pemain");
    }
}
