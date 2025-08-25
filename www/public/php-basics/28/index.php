<?php
class Post
{
    private $name;
    private $salary;

    public function __construct($name, $salary)
    {
        $this->name = $name;
        $this->salary = $salary;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getSalary()
    {
        return $this->salary;
    }
}

$programmer = new Post('программист', 1000);
$manager = new Post('менеджер', 2000);
$driver = new Post('водитель', 3000);

class Employee
{
    private $name;
    private $surname;
    private $post;

    public function __construct($name, $surname, Post $post)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->post = $post;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getSurname()
    {
        return $this->surname;
    }

    public function setSurname($surname)
    {
        $this->surname = $surname;
    }

    public function getPost(): Post
    {
        return $this->post;
    }

    public function changePost(Post $newPost)
    {
        $this->post = $newPost;
    }
}

$employee = new Employee('john', 'rein', $programmer);

echo $employee->getName() . "<br>";
echo $employee->getSurname() . "<br>";
echo $employee->getPost()->getName() . "<br>";
echo $employee->getPost()->getSalary() . "<br>";

$employee->changePost($manager);
echo $employee->getPost()->getName() . "<br>";
echo $employee->getPost()->getSalary() . "<br>";