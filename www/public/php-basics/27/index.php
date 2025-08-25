<?php
class Employee
{
    public $name;
    public $salary;
}

class Student
{
    public $name;
    public $scholarship;
}

$obj11 = new Employee();
$obj11->name = "john";
$obj11->salary = 1000;

$obj12 = new Employee();
$obj12->name = "brad";
$obj12->salary = 1200;

$obj13 = new Employee();
$obj13->name = "mike";
$obj13->salary = 1500;

$obj21 = new Student();
$obj21->name = "anna";
$obj21->scholarship = 500;

$obj22 = new Student();
$obj22->name = "mary";
$obj22->scholarship = 600;

$obj23 = new Student();
$obj23->name = "katy";
$obj23->scholarship = 550;

$arr = [$obj12, $obj21, $obj13, $obj11, $obj23, $obj22];

echo "Имена работников: <br>";
foreach ($arr as $item) {
    if ($item instanceof Employee) {
        echo $item->name . "<br>";
    }
}

echo "Имена студентов: <br>";
foreach ($arr as $item) {
    if ($item instanceof Student) {
        echo $item->name . "<br>";
    }
}

$totalSalary = 0;
$totalScholarship = 0;

foreach ($arr as $item) {
    if ($item instanceof Employee) {
        $totalSalary += $item->salary;
    } elseif ($item instanceof Student) {
        $totalScholarship += $item->scholarship;
    }
}

echo "Сумма зарплат: " . $totalSalary . "<br>";
echo "Сумма стипендий: " . $totalScholarship . "<br>";