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
            'person 2' => [10,11,12,13,14,15,16,17],
            'person 3' => [9,10,11,12,15,16,17,19],
        ];

//        $shifts = [
//            'person 1' => [8.15, 9, 10, 11.45, 12.45, 13, 14, 15],
//            'person 2' => [8.45, 9, 10, 11, 12, 13, 14, 15, 16, 17],
//            'person 3' => [9, 10, 11, 12, 15, 16, 17, 19],
//        ];

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

    public function dailyHours2()
    {
        $start = [
            ['person 1' => 8],
            ['person 2' => 10],
            ['person 3' => 11],
        ];

        $end = [
            'person 1' => 15,
            'person 2' => 17,
            'person 3' => 19,
        ];

        $result = [];

        $currentTime = 0;
        foreach ($start as $key => $pair) {

            if(isset($start[$key+1]))
                echo $start[$key+1][key($start[$key+1])] - $start[$key][key($start[$key])];

            if(isset($start[$key+1])) {

                $result[key($pair)] = $start[$key+1][key($start[$key+1])] - $start[$key][key($start[$key])];

                $currentTime = $start[$key+1][key($start[$key+1])];
            }
        }

        return $result;
    }
}