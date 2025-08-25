<?php
class User
{
    private $name;
    private $age;

    public function __get($property)
    {
        return $this->$property;
    }

    public function __set($property, $value)
    {
        switch ($property) {
            case 'name':
                if ($value != '') {
                    $this->name = $value;
                }
            break;
            case 'age':
                if ($value >= 0 and $value <= 70) {
                    $this->age = $value;
                }
            break;
            default:
            break;
        }
    }
}

$user = new User();
$user->name = 'john';
$user->age = 30;

echo $user->name . '<br>';
echo $user->age . '<br>';

$user->name = '';
$user->age = 80;

echo $user->name . '<br>';
echo $user->age . '<br>';