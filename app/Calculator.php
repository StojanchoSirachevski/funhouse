<?php

namespace App;


class Calculator
{
    /**
     * @var Rota
     */
    private $rota;

    public function __construct(Rota $rota)
    {
        $this->rota = $rota;
    }

    public function dailyHours()
    {
        $dayHours = range(0,23);

        $shifts = [
            'person 1' => [8,9,10,11,12,13,14,15],
//            'person 2' => [8,9,10,11,13,14,15],
            'person 2' => [10,11,12,13,14,15,16,17],
//            'person 3' => [9,10,11,12,15,16,17,19],
        ];

        $result = [];

        foreach ($dayHours as $hour) {

            $countHour = 0;
            $tmp = [];

            foreach ($shifts as $person => $shiftHours) {

                if(in_array($hour, $shiftHours)) {

                    if($countHour > 1) {
                        $tmp = [];
                        $countHour = 0;
                        break;
                    } else {
                        $tmp[$person] = $hour;
                    }

                    $countHour++;
                }
            }

            if($countHour === 1) {
                $result[key($tmp)][] = $tmp[key($tmp)];
            }
        }

        return $result;
    }
}