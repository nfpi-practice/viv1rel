<?php
class Student extends User
{
    private $course;

    public function getCourse()
    {
        return $this->course;
    }

    public function  setCourse($course)
    {
        $this->course = $course;
    }
}