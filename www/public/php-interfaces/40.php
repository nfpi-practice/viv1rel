<?php
interface iUser
{
    public function setName($name);
    public function getName();
    public function setAge($age);
    public function getAge();
}

interface iEmployee extends iUser
{
    public function getSalary();
    public function setSalary($salary);
}

class Employee implements iEmployee
{
    private $name;
    private $age;
    private $salary;

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setAge($age)
    {
        $this->age = $age;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function setSalary($salary)
    {
        $this->salary = $salary;
    }

    public function getSalary()
    {
        return $this->salary;
    }
}

$employee = new Employee();
$employee->setName('john');
$employee->setAge(30);
$employee->setSalary(1000);

echo $employee->getName() . "<br>";
echo $employee->getAge() . "<br>";
echo $employee->getSalary() . "<br>";