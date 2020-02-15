<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    //belongsTo - relacionamento muitos para muitos

    public function marca(){
        return $this->belongsTo('App\Marca');
    }
}
