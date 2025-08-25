<?php
class User
{
    private $name;
    private $age;

    public function __construct($name, $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    public function __get($property)
    {
        return $this->$property;
    }
}

$user = new User('john', 30);
echo $user->name . "<br>";
echo $user->age;

class Date
{
    public $year;
    public $month;
    public $day;

    public function __get($property)
    {
        if ($property === 'weekDay') {
            return "<br>" . date('l', strtotime($this->year . '-' . $this->month . '-' . $this->day));
        }
    }
}

$date = new Date;
$date->year = 2010;
$date->month = 12;
$date->day = 7;
echo $date->weekDay;