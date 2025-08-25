<?php
require_once '../67.php';

class Link extends Tag
{
    const ATTR_ACTIVE = 'active';

    public function __construct()
    {
        $this->setAttr('href', '');
        parent::__construct('a');
    }

    public function open()
    {
        $this->activateSelf();
        return parent::open();
    }

    private function activateSelf()
    {
        if ($this->getAttr('href') === $_SERVER['REQUEST_URI']) {
            $this->addClass(self::ATTR_ACTIVE);
        }
    }
}

echo (new Link)
    ->setAttr('href', 'menu.php')
    ->setAttr('class', 'link1 link2')
    ->setText('index')
    ->show();