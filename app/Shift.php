<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    public function rota()
    {
        return $this->belongsTo('App\Rota');
    }

    public function breaks()
    {
        return $this->hasMany('App\ShiftBreak');
    }

    public function staffMember()
    {
        return $this->belongsTo('App\Staff');
    }
}
