<?php
require_once '67.php';

class ListItem extends Tag
{
    public function __construct()
    {
        parent::__construct('li');
    }

    public function __toString()
    {
        return $this->show();
    }
}

class HtmlList extends Tag
{
    private $items = [];

    public function addItem(ListItem $li)
    {
        $this->items[] = $li;
        return $this;
    }

    public function show()
    {
        $result = $this->open();

        foreach ($this->items as $item) {
            $result .= $item;
        }

        $result .= $this->close();

        return $result;
    }

    public function __toString()
    {
        return $this->show();
    }
}

class Ul extends HtmlList
{
    public function __construct()
    {
        parent::__construct('ul');
    }
}

class Ol extends HtmlList
{
    public function __construct()
    {
        parent::__construct('ol');
    }
}

$ul = new Ul();
$ul->addItem((new ListItem())->setText('item1'))
    ->addItem((new ListItem())->setText('item2'))
    ->addItem((new ListItem())->setText('item3'));
echo $ul;

$ol = new Ol();
$ol->addItem((new ListItem())->setText('item1'))
    ->addItem((new ListItem())->setText('item2'))
    ->addItem((new ListItem())->setText('item3'));
echo $ol;