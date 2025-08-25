<?php
require_once '67.php';

class Form extends Tag
{
    public function __construct()
    {
        parent::__construct('form');
    }
}

class Input extends Tag
{
    public function __construct()
    {
        parent::__construct('input');
    }

    public function open()
    {
        $inputName = $this->getAttr('name');

        if ($inputName) {
            if (isset($_REQUEST[$inputName])) {
                $value = $_REQUEST[$inputName];
                $this->setAttr('value', $value);
            }
        }

        return parent::open();
    }

    public function __toString()
    {
        return $this->open();
    }
}

$form = (new Form)->setAttrs(['action' => '', 'method' => 'GET']);
echo $form->open();
echo (new Input)->setAttr('name', 'number1');
echo (new Input)->setAttr('name', 'number2');
echo (new Input)->setAttr('name', 'number3');
echo (new Input)->setAttr('name', 'number4');
echo (new Input)->setAttr('name', 'number5');
echo (new Input)->setAttr('type', 'submit');
echo $form->close();

if (!empty($_REQUEST)) {
    $sum = $_REQUEST['number1'] + $_REQUEST['number2'] + $_REQUEST['number3'] + $_REQUEST['number4'] + $_REQUEST['number5'];
} else {
    $sum = 0;
}

print_r($sum);