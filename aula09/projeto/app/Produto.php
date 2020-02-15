<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    //belongsTo - relacionamento um para muitos

    public function marca(){
        return $this->belongsTo('App\Marca');
    }

    //belongsToMany - relacionamento muitos para muitos
    public function departamentos(){
        return $this->belongsToMany('App\Departamento','produto_departamento');
    }
}
