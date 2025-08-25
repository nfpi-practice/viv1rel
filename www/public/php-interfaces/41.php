<?php
interface Figure3d
{
    public function getVolume();
    public function getSurfaceSquare();
}

class Cube implements Figure3d
{
    private $a;

    public function __construct($a)
    {
        $this->a = $a;
    }

    public function getVolume()
    {
        return pow($this->a, 3);
    }

    public function getSurfaceSquare()
    {
        return 6 * $this->a * $this->a;
    }
}

interface iFigure
{
    public function getSquare();
    public function getPerimeter();
}

class Quadrate implements iFigure
{
    private $a;

    public function __construct($a)
    {
        $this->a = $a;
    }

    public function getSquare()
    {
        return $this->a * $this->a;
    }

    public function getPerimeter()
    {
        return 4 * $this->a;
    }
}

class Rectangle implements iFigure
{
    private $a;
    private $b;

    public function __construct($a, $b)
    {
        $this->a = $a;
        $this->b = $b;
    }

    public function getSquare()
    {
        return $this->a * $this->b;
    }

    public function getPerimeter()
    {
        return 2 * ($this->a + $this->b);
    }
}

$quadrate1 = new Quadrate(2);
$quadrate2 = new Quadrate(3);
$rectangle1 = new Rectangle(2, 3);
$rectangle2 = new Rectangle(3, 4);
$cube1 = new Cube(2);
$cube2 = new Cube(3);

$arr = [$quadrate2, $cube1, $rectangle1, $cube2, $quadrate1, $rectangle2];

foreach ($arr as $element) {
    if ($element instanceof iFigure) {
        echo get_class($element) . " " . $element->getSquare() . "<br>";
    }
}

echo "<br>";

foreach ($arr as $element) {
    if ($element instanceof iFigure) {
        echo get_class($element) . " " . $element->getSquare() . "<br>";
    } elseif ($element instanceof Figure3d) {
        echo get_class($element) . " " . $element->getSurfaceSquare() . "<br>";
    }
}