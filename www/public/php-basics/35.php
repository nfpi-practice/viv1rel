<?php
abstract class User
{
    private $name;

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    abstract public function increaseRevenue($value);

    abstract public function decreaseRevenue($value);
}

class Employee extends User
{
    private $salary;

    public function getSalary()
    {
        return $this->salary;
    }

    public function setSalary($salary)
    {
        $this->salary = $salary;
    }

    public function increaseRevenue($value)
    {
        $this->salary += $value;
    }

    public function decreaseRevenue($value)
    {
        $this->salary -= $value;
    }
}

$employee = new Employee;
$employee->setName('john');
$employee->setSalary(1000);
$employee->increaseRevenue(100);

echo $employee->getName() . " ";
echo $employee->getSalary() . " ";

$employee->decreaseRevenue(200);
echo $employee->getSalary() . "<br>";

class Student extends User
{
    private $scholarship;

    public function getScholarship()
    {
        return $this->scholarship;
    }

    public function setScholarship($scholarship)
    {
        $this->scholarship = $scholarship;
    }

    public function increaseRevenue($value)
    {
        $this->scholarship += $value;
    }

    public function decreaseRevenue($value)
    {
        $this->scholarship -= $value;
    }
}

$student = new Student;
$student->setName('mike');
$student->setScholarship(500);
$student->increaseRevenue(100);

echo $student->getName() . " ";
echo $student->getScholarship() . " ";

$student->decreaseRevenue(200);
echo $student->getScholarship() . "<br>";

abstract class Figure
{
    abstract public function getSquare();
    abstract public function getPerimeter();

    public function getSquarePerimeterSum()
    {
        return $this->getSquare() + $this->getPerimeter();
    }
}

class Quadrate extends Figure
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

$quadrate = new Quadrate(2);
echo $quadrate->getSquare() . "<br>";
echo $quadrate->getPerimeter() . "<br>";
echo $quadrate->getSquarePerimeterSum() . "<br>";

class Rectangle extends Figure
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
        return 2 * $this->a + 2 * $this->b;
    }
}

$rectangle = new Rectangle(2, 3);
echo $rectangle->getSquare() . "<br>";
echo $rectangle->getPerimeter() . "<br>";
echo $rectangle->getSquarePerimeterSum() . "<br>";