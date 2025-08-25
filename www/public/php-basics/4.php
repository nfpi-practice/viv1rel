<?php
class Employee
{
    public $name;
    public $age;
    public $salary;

    public function getName()
    {
        return $this->name;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function getSalary()
    {
        return $this->salary;
    }

    public function checkAge()
    {
        return $this->age > 18;
    }

    public function doubleSalary()
    {
        return $this->salary * 2;
    }
}

$employee1 = new Employee();
$employee1->name = 'john';
$employee1->age = 25;
$employee1->salary = 1000;

$employee2 = new Employee();
$employee2->name = 'eric';
$employee2->age = 26;
$employee2->salary = 2000;

echo $employee1->getSalary() + $employee2->getSalary();

////////////////////////////////////////////
echo "<br>";
////////////////////////////////////////////

class User
{
    public $name;
    public $age;

    public function setAge($age)
    {
        if ($age >= 18) {
            $this->age = $age;
        }
    }
}

$user = new User();
$user->name = 'john';
$user->age = 25;

$user->setAge(30);
echo $user->age;

////////////////////////////////////////////
echo "<br>";
////////////////////////////////////////////

class Rectangle
{
    public $height;
    public $width;

    public function getSquare()
    {
        return $this->height * $this->width;
    }

    public function getPerimetr()
    {
        return ($this->height + $this->width) * 2;
    }
}