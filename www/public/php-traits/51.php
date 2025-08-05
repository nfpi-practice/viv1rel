<?php
trait Trait1
{
    private function method1()
    {
        return 1;
    }

    private function method2()
    {
        return 2;
    }
}

trait Trait2
{
    use Trait1;

    private function method3()
    {
        return 3;
    }
}

class Test
{
    use Trait2;

    public function __construct()
    {
        echo $this->getSum();
    }

    public function getSum()
    {
        return $this->method1() + $this->method2() + $this->method3();
    }
}

new Test();