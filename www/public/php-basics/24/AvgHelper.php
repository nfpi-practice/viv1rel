<?php
class AvgHelper
{
    public function getAvg($arr)
    {
        return array_sum($arr) / count($arr);
    }

    public function getMeanSquare($arr)
    {
        $sum = 0;

        foreach ($arr as $elem) {
            $sum += pow($elem, 2);
        }

        $avg = $sum / count($arr);

        return sqrt($avg);
    }
}