<?php
require_once 'User.php';
require_once 'Employee.php';
require_once 'Student.php';

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