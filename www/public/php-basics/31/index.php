<?php
class User
{
    private static $count = 0;
    public $name;

    public function __construct($name)
    {
        $this->name = $name;

        self::$count++;
    }

    public static function getCount()
    {
        return self::$count;
    }
}

$user1 = new User('user1');
echo User::getCount() . "<br>";

$user2 = new User('user2');
echo User::getCount() . "<br>";