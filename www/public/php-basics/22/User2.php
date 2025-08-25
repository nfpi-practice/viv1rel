<?php
class User2
{
    private $name;
    private $surname;
    private $birthday;
    private $age;

    public function __construct($name, $surname, $birthday)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->birthday = date("Y-m-d", strtotime($birthday));
        $this->age = $this->calculateAge();
    }

    public function getName()
    {
        return $this->name;
    }

    public function getSurname()
    {
        return $this->surname;
    }

    public function getBirthday()
    {
        return $this->birthday;
    }

    public function getAge()
    {
        return $this->age;
    }

    private function calculateAge()
    {
        $dateNow = date("Y-m-d");
        $userYear = date("Y", strtotime($this->birthday));
        $userMonth = date("m", strtotime($this->birthday));
        $userDay = date("d", strtotime($this->birthday));
        $age = date("Y", strtotime($dateNow)) - $userYear;
        if ($userMonth > date("m", strtotime($dateNow))) $age -= 1;
        if ($userMonth == date("m", strtotime($dateNow)))
        {
            if ($userDay > date("d", strtotime($dateNow))) $age -= 1;
        }
        return $age;
    }
}