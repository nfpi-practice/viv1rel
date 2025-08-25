<?php
require_once 'classes.php';

class Option extends Tag
{
    public function __construct()
    {
        parent::__construct('option');
    }

    public function __toString()
    {
        return $this->show();
    }

    public function setSelected()
    {
        return $this->setAttr('selected');
    }
}

class Select extends Tag
{
    private $items = [];

    public function __construct()
    {
        parent::__construct('select');
    }

    public function add(Option $option)
    {
        $this->items[] = $option;
        return $this;
    }

    public function show()
    {
        $inputName = $this->getAttr('name');

        if ($inputName) {
            if (isset($_REQUEST[$inputName])) {
                foreach ($this->items as $element) {
                    $element->removeAttr('selected');
                    if ($element->getText() === $_REQUEST[$inputName]) {
                        $element->setAttr('selected');
                    }
                }
            }
            $this->setText(implode('', $this->items));
        }

        return parent::show();
    }

    public function __toString()
    {
        return $this->show();
    }
}

$form = (new Form)->setAttrs([
    'action' => '',
    'method' => 'GET'
]);

echo $form->open();
echo (new Select)->setAttr('name', 'list')
    ->add( (new Option())->setText('item1') )
    ->add( (new Option())->setText('item2')->setSelected() )
    ->add( (new Option())->setText('item3') )
    ->show();
echo (new Select)->setAttr('name', 'list2')
    ->add( (new Option())->setText('item1') )
    ->add( (new Option())->setText('item2')->setSelected() )
    ->add( (new Option())->setText('item3') )
    ->show();
echo new Submit();
echo $form->close();
