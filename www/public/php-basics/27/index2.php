<?php
class User
{
    public $name;
    public $surname;
}

class Employee extends User
{
    public $salary;
}

class City
{
    public $name;
    public $population;
}

$user1 = new User();
$user1->name = 'john';
$user1->surname = 'rein';

$user2 = new User();
$user2->name = 'emily';
$user2->surname = 'white';

$user3 = new User();
$user3->name = 'mike';
$user3->surname = 'smith';

$employee1 = new Employee();
$employee1->name = 'david';
$employee1->surname = 'brown';
$employee1->salary = 1000;

$employee2 = new Employee();
$employee2->name = 'sarah';
$employee2->surname = 'davis';
$employee2->salary = 1200;

$employee3 = new Employee();
$employee3->name = 'robert';
$employee3->surname = 'miller';
$employee3->salary = 1500;

$city1 = new City();
$city1->name = 'Moscow';
$city1->population = 8500000;

$city2 = new City();
$city2->name = 'Kazan';
$city2->population = 4000000;

$city3 = new City();
$city3->name = 'Omsk';
$city3->population = 2700000;

$arr = [$user1, $city1, $employee1, $user2, $city2, $employee2, $user3, $city3, $employee3];

echo "Принадлежат классу User или потомку этого класса: <br>";
foreach ($arr as $item) {
    if ($item instanceof User) {
        echo $item->name . "<br>";
    }
}

echo "Не принадлежат классу User или потомку этого класса: <br>";
foreach ($arr as $item) {
    if (!($item instanceof User)) {
        echo $item->name . "<br>";
    }
}

echo "Принадлежат именно классу User: <br>";
foreach ($arr as $item) {
    if (get_class($item) === 'User') {
        echo $item->name . "<br>";
    }
}