<?php
require_once 'User.php';
require_once 'Student.php';

$student = new Student('john', 19, 2); // теперь это работает

echo $student->getName();   // выведет 'john'
echo $student->getAge();    // выведет 19
echo $student->getCourse(); // выведет 2