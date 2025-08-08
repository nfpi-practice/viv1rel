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

class Submit extends Input
{
    public function __construct()
    {
        $this->setAttr('type', 'submit');
        parent::__construct();
    }
}

class Password extends Input
{
    public function __construct()
    {
        $this->setAttr('type', 'password');
        parent::__construct();
    }
}

class Hidden extends Input
{
    public function __construct()
    {
        $this->setAttr('type', 'hidden');
        parent::__construct();
    }
}

class Textarea extends Tag
{
    public function __construct()
    {
        parent::__construct('textarea');
    }

    public function show()
    {
        $inputName = $this->getAttr('name');

        if ($inputName) {
            if (isset($_REQUEST[$inputName])) {
                $text = $_REQUEST[$inputName];
                $this->setText($text);
            }
        }

        return parent::show();
    }

    public function __toString()
    {
        return $this->show();
    }
}

$form = (new Form)->setAttrs(['action' => '', 'method' => 'GET']);

echo $form->open();
echo (new Input)->setAttr('name', 'user');
echo (new Textarea)->setAttr('name', 'message')->show();
echo new Submit;
echo $form->close();