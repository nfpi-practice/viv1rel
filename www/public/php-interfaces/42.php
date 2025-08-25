<?php
interface iFigure
{
    public function getSquare();
    public function getPerimeter();
}

interface iTetragon
{
    public function getA();
    public function getB();
    public function getC();
    public function getD();
}

class Rectangle implements iTetragon, iFigure
{
    private $a;
    private $b;

    public function __construct($a, $b)
    {
        $this->a = $a;
        $this->b = $b;
    }

    public function getA()
    {
        return $this->a;
    }

    public function getB()
    {
        return $this->b;
    }

    public function getC()
    {
        return $this->a;
    }

    public function getD()
    {
        return $this->b;
    }

    public function getSquare()
    {
        return $this->a * $this->b;
    }

    public function getPerimeter()
    {
        return 2 * $this->a + 2 * $this->b;
    }
}

interface iCircle
{
    public function getRadius();
    public function getDiameter();
}

class Disk implements iFigure, iCircle
{
    private $radius;

    public function __construct($radius)
    {
        $this->radius = $radius;
    }

    public function getSquare()
    {
        return pi() * $this->radius * $this->radius;
    }

    public function getPerimeter()
    {
        return 2 * pi() * $this->radius;
    }

    public function getRadius()
    {
        return $this->radius;
    }

    public function getDiameter()
    {
        return 2 * $this->radius;
    }
}

$rectangle = new Rectangle(3, 4);
echo $rectangle->getSquare() . "<br>";
echo $rectangle->getPerimeter() . "<br>";
echo $rectangle->getA() . " " . $rectangle->getB() . " " . $rectangle->getC() . " " . $rectangle->getD() . "<br><br>";

$disk = new Disk(5);
echo $disk->getSquare() . "<br>";
echo $disk->getPerimeter() . "<br>";
echo $disk->getRadius() . "<br>";
echo $disk->getDiameter() . "<br>";