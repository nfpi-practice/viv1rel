<?php
trait TestTrait
{
    public function method1()
    {
        return 1;
    }

    abstract public function method2();
}

class Test
{
    use TestTrait; // используем трейт

    // Реализуем абстрактный метод:

}

new Test();

// Fatal error: Class Test contains 1 abstract method and must therefore be declared abstract or implement the remaining methods (Test::method2) in /var/www/html/public/php-traits/50.php on line 12