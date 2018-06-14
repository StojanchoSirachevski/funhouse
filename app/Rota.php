<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rota extends Model
{
    public function shifts()
    {
        return $this->hasMany('App\Shift');
    }

    public function shop()
    {
        return $this->belongsTo('App\Shop');
    }
}
