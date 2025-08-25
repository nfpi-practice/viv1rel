<?php
class Num
{
    private static $num1 = 2;
    private static $num2 = 3;

    public static function getSum()
    {
        return Num::$num1 + Num::$num2;
    }
}

echo Num::getSum() . "<br>";

class Geometry
{
    private static $pi = 3.14;

    public static function getCircleSquare($radius)
    {
        return self::$pi * $radius * $radius;
    }

    public static function getCircleСircuit($radius)
    {
        return 2 * self::$pi * $radius;
    }

    public static function getVolume($radius)
    {
        return 4 / 3 * self::$pi * $radius * $radius * $radius;
    }
}

echo Geometry::getVolume(10) . "<br>";