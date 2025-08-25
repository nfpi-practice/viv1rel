<?php
class Employee
{
    private $name;
    private $age;
    private $salary;

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
        return $this->salary . '$';
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setAge($age)
    {
        if ($this->isAgeCorrect($age)) {
            $this->age = $age;
        }
    }

    public function setSalary($salary)
    {
        $this->salary = $salary;
    }

    private function isAgeCorrect($age)
    {
        return ($age >= 1 and $age <= 100);
    }
}

$employee1 = new Employee();
$employee1->setName('john');
$employee1->setAge(25);
$employee1->setSalary(1000);
print_r($employee1->getName() . "<br>");
print_r($employee1->getAge() . "<br>");
print_r($employee1->getSalary() . "<br>");

$employee1->setAge(0);
print_r($employee1->getAge() . "<br>");