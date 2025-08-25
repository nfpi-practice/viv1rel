<?php
class User
{
    public $name;
    public $age;

    public function setAge($age)
    {
        if ($this->isAgeCorrect($age)) {
            $this->age = $age;
        }
    }

    public function addAge($years)
    {
        $newAge = $this->age + $years;
        if ($this->isAgeCorrect($newAge)) {
            $this->age = $newAge;
        }
    }

    public function subAge($years)
    {
        $newAge = $this->age - $years;
        if ($this->isAgeCorrect($newAge)) {
            $this->age = $newAge;
        }
    }

    private function isAgeCorrect($age)
    {
        if ($age >= 18 and $age <= 60) {
            return true;
        } else {
            return false;
        }
    }
}

$user = new User();

$user->setAge(30);
echo $user->age;
echo "<br>";
$user->setAge(10);
echo $user->age;

echo "<br>";

$user->addAge(5);
echo $user->age;
echo "<br>";
$user->addAge(30);
echo $user->age;

echo "<br>";

$user->subAge(10);
echo $user->age;
echo "<br>";
$user->subAge(30);
echo $user->age;

// $user->isAgeCorrect(61);

echo "<br>";

class Student
{
    public $name;
    public $course;

    public function transferToNextCourse()
    {
        $newCourse = $this->course + 1;
        if ($this->isCourseCorrect()) $this->course = $newCourse;
    }

    private function isCourseCorrect()
    {
        $newCourse = $this->course + 1;
        return ($newCourse <= 5) ? true : false;
    }
}

$student = new Student();
$student->course = 4;
print_r($student->course . "\n");
$student->transferToNextCourse();
print_r($student->course . "\n");
$student->transferToNextCourse();
print_r($student->course . "\n");