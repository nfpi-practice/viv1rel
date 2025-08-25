<?php
interface iSphere
{
    const PI = 3.14;

    public function __construct($radius);
    public function getVolume();
    public function getSquare();
}

class Sphere implements iSphere
{
    private $radius;

    public function __construct($radius)
    {
        $this->radius = $radius;
    }

    public function getVolume()
    {
        return 4 / 3 * self::PI * pow($this->radius, 3);
    }

    public function getSquare()
    {
        return 4 * self::PI * $this->radius * $this->radius;
    }
}

$sphere = new Sphere(5);
echo $sphere->getVolume() . "<br>";
echo $sphere->getSquare();