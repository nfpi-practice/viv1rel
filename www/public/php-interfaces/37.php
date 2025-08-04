<?php
interface Figure
{
    public function getSquare();
    public function getPerimeter();
}

class Quadrate implements Figure
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

class Rectangle implements Figure
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

class Disk implements Figure
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
        return 2 * 3.14 * $this->radius;
    }
}

class FiguresCollection
{
    private $figures = [];

    public function addFigure(Figure $figure)
    {
        $this->figures[] = $figure;
    }

    public function getTotalSquare()
    {
        $sum = 0;

        foreach ($this->figures as $figure) {
            $sum += $figure->getSquare();
        }

        return $sum;
    }

    public function getTotalPerimeter()
    {
        $sum = 0;

        foreach ($this->figures as $figure) {
            $sum += $figure->getPerimeter();
        }

        return $sum;
    }
}

$collection = new FiguresCollection();
$collection->addFigure(new Disk(5));
$collection->addFigure(new Quadrate(4));
$collection->addFigure(new Rectangle(2, 3));

echo $collection->getTotalSquare() . "<br>";
echo $collection->getTotalPerimeter() . "<br>";