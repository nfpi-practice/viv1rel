<?php
class Employee
{
    private $name;
    private $surname;
    private $salary;

    public function __construct($name, $surname, $salary)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->salary = $salary;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getSurname()
    {
        return $this->surname;
    }

    public function getSalary()
    {
        return $this->salary;
    }

    public function setSalary($salary)
    {
        $this->salary = $salary;
    }
}

$employee1 = new Employee('john', 'doe', '100');
print_r($employee1->getName() . '<br>');
print_r($employee1->getSurname() . '<br>');
print_r($employee1->getSalary() . '<br>');
$employee1->setSalary(200);
print_r($employee1->getSalary() . '<br>');