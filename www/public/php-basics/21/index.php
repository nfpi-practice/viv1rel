<?php
require_once 'User.php';
require_once 'Student.php';

$user = new User();

$user->setName('john');
echo $user->getName();
$user->setName('joh');
echo $user->getName();

echo '<br>';

$student = new Student();

$student->setName('john');
echo $student->getName();

$student->setName('qwertyuiop');
echo $student->getName();