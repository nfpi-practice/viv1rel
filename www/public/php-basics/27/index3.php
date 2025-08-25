<?php
class Employee
{
    private $name;
    private $salary;

    public function __construct($name, $salary)
    {
        $this->name = $name;
        $this->salary = $salary;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getSalary()
    {
        return $this->salary;
    }
}

class Student
{
    private $name;
    private $scholarship; // стипендия

    public function __construct($name, $scholarship)
    {
        $this->name = $name;
        $this->scholarship = $scholarship;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getScholarship()
    {
        return $this->scholarship;
    }
}

class UsersCollection
{
    private $employees = [];
    private $students = [];

    public function add($user)
    {
        if ($user instanceof Employee) {
            $this->employees[] = $user;
        }

        if ($user instanceof Student) {
            $this->students[] = $user;
        }
    }

    public function getTotalSalary() {
        $sum = 0;
        foreach ($this->employees as $employee) {
            $sum += $employee->getSalary();
        }
        return $sum;
    }

    public function getTotalScholarship() {
        $sum = 0;
        foreach ($this->students as $student) {
            $sum += $student->getScholarship();
        }
        return $sum;
    }

    public function getTotalPayment()
    {
        return $this->getTotalSalary() + $this->getTotalScholarship();
    }
}

$usersCollection = new UsersCollection;

$usersCollection->add(new Student('kyle', 100));
$usersCollection->add(new Student('luis', 200));

$usersCollection->add(new Employee('john', 300));
$usersCollection->add(new Employee('eric', 400));

echo $usersCollection->getTotalScholarship() . "<br>";
echo $usersCollection->getTotalSalary() . "<br>";
echo $usersCollection->getTotalPayment() . "<br>";