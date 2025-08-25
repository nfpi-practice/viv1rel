<?php
// Задание 1
echo "Задание 1 <br>";
class Test {}
$obj = new Test();
echo get_class($obj) . "<br><br>";

// Задание 2
echo "Задание 2 <br>";
class Test1 { public $name = 'Test1'; }
class Test2 { public $name = 'Test2'; }

$arr = [new Test1(), new Test2(), new Test1()];

foreach ($arr as $item) {
    echo $item->name . ' (' . get_class($item) . ")<br>";
}
echo "<br>";

// Задание 3
class Test3 {
    public function method1() { echo "method1 вызван<br>"; }
    public function method2() { echo "method2 вызван<br>"; }
    public function method3() { echo "method3 вызван<br>"; }
}

echo "Задание 3 <br>";
print_r(get_class_methods('Test'));
echo "<br><br>";

// Задание 4
echo "Задание 4 <br>";
$test = new Test3();
foreach (get_class_methods($test) as $method) {
    $test->$method();
}
echo "<br>";

// Задание 5
// echo "Задание 5 <br>";
class Test5 {
    public $prop1 = 'public1';
    public $prop2 = 'public2';
    private $prop3 = 'private3';
    private $prop4 = 'private4';

    // Задание 7
    public function __construct() {
        echo "Задание 7 <br>";
        print_r(get_class_vars(__CLASS__));
        echo "<br><br>";
    }
}

// Задание 6
echo "Задание 6 <br>";
print_r(get_class_vars('Test5'));
echo "<br><br>";

// Задание 7
$test7= new Test5();

// Задание 8
echo "Задание 8 <br>";
class Test8 {
    public $prop1 = 'public1';
    public $prop2 = 'public2';
    private $prop3 = 'private3';
    private $prop4 = 'private4';
}

$testObj = new Test8();
print_r(get_object_vars($testObj));
echo "<br><br>";

// Задание 9
echo "Задание 9 <br>";
class Test9 {}
echo "Test1: " . (class_exists('Test1')) . "<br>";
echo "Test4: " . (class_exists('Test4')) . "<br><br>";

// Задание 10
// http://localhost/public/php-basics/33/index.php?class=Test1
echo "Задание 10 <br>";
if (isset($_GET['class'])) {
    echo (class_exists($_GET['class']) ? 'существует' : 'не существует') ;
}
echo "<br><br>";

// Задание 11
class Test11 {
    public function method11() { return "method11 работает <br>"; }
}

$test = new Test11();
echo "Задание 11 <br>";
echo "method11: " . (method_exists($test, 'method11') ? 'есть' : 'нет') . "<br>";
echo "method22: " . (method_exists($test, 'method22') ? 'есть' : 'нет') . "<br><br>";

// Задание 12
// http://localhost/public/php-basics/33/index.php?class=Test4&class=Test11&method=method11
echo "Задание 12 <br>";
if (isset($_GET['class']) && isset($_GET['method'])) {
    $className = $_GET['class'];
    $methodName = $_GET['method'];

    if (class_exists($className)) {
        if (method_exists($className, $methodName)) {
            $obj = new $className();
            $result = $obj->$methodName();
            echo $result . "<br>";
        }
    }
}

// Задание 13
echo "Задание 13 <br>";
class Test13 {
    public $prop1 = 'значение1';
    private $prop3 = 'значение3';
}

$test13 = new Test13();

echo "property_exists('prop1'): " . (property_exists($test13, 'prop1') ? 'true' : 'false') . "<br>";
echo "property_exists('prop2'): " . (property_exists($test13, 'prop2') ? 'true' : 'false') . "<br>";
echo "property_exists('prop3'): " . (property_exists($test13, 'prop3') ? 'true' : 'false') . "<br><br>";

// Задание 14
echo "Задание 14 <br>";
$props = ['prop1', 'prop2', 'prop3'];
foreach ($props as $prop) {
    echo "$prop: " . (property_exists($test13, $prop) ? 'есть' : 'нет') . "<br>";
}
echo "<br>";

// Задание 15
echo "Задание 15 <br>";
class ParentClass {}
class ChildClass extends ParentClass {}
echo get_parent_class('ChildClass') . "<br><br>";

// Задание 16
// echo "Задание 16 <br>";
class GrandParentClass {}
class ParentClass2 extends GrandParentClass {}
class ChildClass2 extends ParentClass2 {}

// Задание 17
echo "Задание 17 <br>";
echo (is_subclass_of('ChildClass2', 'GrandParentClass') ? 'да' : 'нет') . "<br><br>";

// Задание 18
echo "Задание 18 <br>";
echo (is_subclass_of('ParentClass2', 'GrandParentClass') ? 'да' : 'нет') . "<br><br>";

// Задание 19
echo "Задание 19 <br>";
echo (is_subclass_of('ChildClass2', 'ParentClass2') ? 'да' : 'нет') . "<br><br>";

// Задание 20
// echo "Задание 20 <br>";
$obj = new ChildClass2();

// Задание 21
echo "Задание 21 <br>";
echo (is_a($obj, 'ChildClass2') ? 'да' : 'нет') . "<br>";

// Задание 22
echo "Задание 22 <br>";
echo (is_a($obj, 'ParentClass2') ? 'да' : 'нет') . "<br><br>";

// Задание 23
echo "Задание 23 <br>";
echo "<pre>";
print_r(get_declared_classes());
echo "</pre>";