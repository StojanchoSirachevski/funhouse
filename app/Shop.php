<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    public function rotas()
    {
        return $this->hasMany('App\Rota');
    }
}
