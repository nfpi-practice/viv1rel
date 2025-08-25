<?php
interface iProgrammer
{
    public function __construct($name, $salary);
    public function getName();
    public function getSalary();
    public function getLangs();
    public function addLang($lang);
}

class Employee
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

class Programmer extends Employee implements iProgrammer
{
    private $langs = [];

    public function __construct($name, $salary)
    {
        parent::__construct($name, $salary);
    }

    public function getLangs()
    {
        return $this->langs;
    }

    public function addLang($lang)
    {
        return $this->langs[] = $lang;
    }
}

$programmer = new Programmer('john', 1000);
$programmer->addLang('PHP');
$programmer->addLang('JavaScript');

echo $programmer->getName() . "<br>";
echo $programmer->getSalary() . "<br>";
print_r($programmer->getLangs());