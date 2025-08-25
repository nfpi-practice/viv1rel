<?php
require_once '67.php';

class Image extends Tag
{
    public function __construct()
    {
        $this->setAttr('src', '')->setAttr('alt', '');
        parent::__construct('img');
    }

    public function __toString()
    {
        return parent::open();
    }
}

echo (new Image())->setAttr('src', 'images/68.png')->setAttr('width', '300')->setAttr('height', '200')->open();;