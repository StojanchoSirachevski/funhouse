<?php

namespace App\Http\Controllers;

use App\Calculator;
use App\Rota;

class ShopManagementController extends Controller
{
    public function calculate()
    {
        $rota = Rota::with('shifts')->find(1);
//        $rota = Rota::find(1);

        $calculator = new Calculator($rota);

//        dd($calculator->dailyHours());

        return $calculator->dailyHours2();
    }
}