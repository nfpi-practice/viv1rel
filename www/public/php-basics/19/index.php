<?php
require_once 'User.php';
require_once 'Employee.php';
require_once 'Student.php';
require_once 'Programmer.php';
require_once 'Driver.php';

$employee = new Employee;

$employee->setSalary(1000); // метод класса Employee
$employee->setName('john'); // метод унаследован от родителя
$employee->setAge(25); // метод унаследован от родителя

echo $employee->getSalary(); // метод класса Employee
echo $employee->getName(); // метод унаследован от родителя
echo $employee->getAge(); // метод унаследован от родителя

echo '<br>';

$student = new Student;

$student->setCourse(3); // метод класса Student
$student->setName('john'); // метод унаследован от родителя
$student->setAge(25); // метод унаследован от родителя

echo $student->getCourse(); // метод класса Student
echo $student->getName(); // метод унаследован от родителя
echo $student->getAge(); // метод унаследован от родителя

echo '<br>';

$programmer = new Programmer();

$programmer->setName('alice');
$programmer->setAge(28);
$programmer->setSalary(5000);
$programmer->setLangs('PHP');
$programmer->setLangs('JavaScript');
$programmer->setLangs('Python');

echo $programmer->getName();
echo $programmer->getAge();
echo $programmer->getSalary();
echo implode(', ', $programmer->getLangs());

echo '<br>';

$driver = new Driver();
$driver->setName('Bob');
$driver->setAge(35);
$driver->setSalary(4000);
$driver->setExperience(10);
$driver->setCategory('B');

echo $driver->getName();
echo $driver->getAge();
echo $driver->getSalary();
echo $driver->getExperience();
echo $driver->getCategory();