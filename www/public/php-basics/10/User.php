<?php
class User
{
    private $name;
    private $age;

    // Конструктор объекта:
    public function __construct($name, $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    // Геттер для имени:
    public function getName()
    {
        return $this->name;
    }

    // Геттер для возраста:
    public function getAge()
    {
        return $this->age;
    }

    // Сеттер для возраста:
    public function setAge($age)
    {
        $this->age = $age;
    }
}