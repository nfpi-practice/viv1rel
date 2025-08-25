<?php
require_once 'User.php';
require_once 'Employee.php';

$user = new User('john', 25);
$employee1 = new Employee('john', 'doe', '100');

print_r($user);
print_r($employee1);