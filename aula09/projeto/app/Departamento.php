<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    //belongsToMany - relacionamento muitos para muitos
    public function departamentos(){
        return $this->belongsToMany('App\Produto','produto_departamento');
    }
}
