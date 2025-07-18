<?php
require_once 'User2.php';

$user = new User2("john", "rein", "24.03.2004");
echo $user->getAge();

echo '<br>';

require_once 'Employee.php';

$employee = new Employee("john", "rein", "2004-03-24", 2000);
echo $employee->getName() . " " . $employee->getSurname() . " " . $employee->getBirthday(). " " . $employee->getAge() . " " . $employee->getSalary();