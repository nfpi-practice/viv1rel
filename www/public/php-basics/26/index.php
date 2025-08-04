<?php
require_once 'User.php';
require_once 'Employee.php';
require_once 'EmployeesCollection.php';

function compare1($obj1, $obj2) {
    return $obj1 == $obj2;
}

function compare2($obj1, $obj2) {
    return $obj1 === $obj2;
}

function compare3($obj1, $obj2) {
    if ($obj1 === $obj2) {
        return 1;
    }

    if (get_class($obj1) === get_class($obj2) && $obj1 == $obj2) {
        return 0;
    }

    return -1;
}

$user1 = new User('john', 30);
$user2 = new User('john', 30);
$user3 = new User('mary', 25);
$user4 = $user1;

var_dump(compare1($user1, $user2));
echo "<br>";
var_dump(compare1($user1, $user3));
echo "<br>";

var_dump(compare2($user1, $user2));
echo "<br>";
var_dump(compare2($user1, $user4));
echo "<br>";

var_dump(compare3($user1, $user4));
echo "<br>";
var_dump(compare3($user1, $user2));
echo "<br>";
var_dump(compare3($user1, $user3));
echo "<br>";

$employeesCollection = new EmployeesCollection();

$employee = new Employee('john', 30);

$employeesCollection->add($employee);
$employeesCollection->add($employee);

var_dump($employeesCollection->get());