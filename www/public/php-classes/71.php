<?php
require_once '67.php';

class Form extends Tag
{
    public function __construct()
    {
        parent::__construct('form');
    }
}

$form = (new Form)->setAttrs([
    'action' => 'test.php',
    'method' => 'POST'
]);

echo $form->open();
echo $form->close();