<?php
class Student extends User
{
    private $course;

    public function __construct($name, $age, $course)
    {
        $this->name = $name;
        $this->age = $age;
        $this->course = $course;
    }

    public function getCourse()
    {
        return $this->course;
    }
}