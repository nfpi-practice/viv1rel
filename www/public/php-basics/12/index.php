<?php
require_once 'Student.php';

$student = new Student('john');
print_r($student->getName() . '<br>');
print_r($student->getCourse() . '<br>');
$student->transferToCourse();
print_r($student->getCourse() . '<br>');
$student->transferToCourse();
print_r($student->getCourse() . '<br>');
$student->transferToCourse();
print_r($student->getCourse() . '<br>');
$student->transferToCourse();
print_r($student->getCourse() . '<br>');
$student->transferToCourse();
print_r($student->getCourse() . '<br>');
