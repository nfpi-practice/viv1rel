<?php
class Tag
{
    private $name;
    private $attrs = [];

    public function __construct($name, $attrs = [])
    {
        $this->name = $name;
        $this->attrs = $attrs;
    }

    public function setAttr($name, $value)
    {
        $this->attrs[$name] = $value;
        return $this;
    }

    public function setAttrs($attrs)
    {
        foreach ($attrs as $name => $value) {
            $this->setAttr($name, $value);
        }

        return $this;
    }

    public function removeAttr($name)
    {
        unset($this->attrs[$name]);
        return $this;
    }

    public function open()
    {
        $name = $this->name;
        $attrsStr = $this->getAttrsStr($this->attrs);

        return "<$name$attrsStr>";
    }

    public function close()
    {
        $name = $this->name;
        return "</$name>";
    }

    private function getAttrsStr($attrs)
    {
        if (!empty($attrs)) {
            $result = '';

            foreach ($attrs as $name => $value) {
                $result .= " $name=\"$value\"";
            }

            return $result;
        } else {
            return '';
        }
    }
}

$tag = new Tag('input');

echo $tag->setAttrs(['id' => 'test1', 'class' => 'test2'])->setAttr('type', 'test3')->open();