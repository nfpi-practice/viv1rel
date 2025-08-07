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

    public function addClass($className)
    {
        if (isset($this->attrs['class'])) {
            $classNames = explode(' ', $this->attrs['class']);

            if (!in_array($className, $classNames)) {
                $classNames[] = $className;
                $this->attrs['class'] = implode(' ', $classNames);
            }
        } else {
            $this->attrs['class'] = $className;
        }

        return $this;
    }

    public function removeClass($className)
    {
        if (isset($this->attrs['class'])) {
            $classNames = explode(' ', $this->attrs['class']);

            if (in_array($className, $classNames)) {
                $classNames = $this->removeElem($className, $classNames);
                $this->attrs['class'] = implode(' ', $classNames);
            }
        }

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
                if ($value === true) {
                    $result .= " $name";
                } else {
                    $result .= " $name=\"$value\"";
                }
            }

            return $result;
        } else {
            return '';
        }
    }

    private function removeElem($elem, $arr)
    {
        $key = array_search($elem, $arr);
        array_splice($arr, $key, 1);

        return $arr;
    }
}

echo (new Tag('input'))->addClass('eee')->open();
echo (new Tag('input'))->addClass('eee')->addClass('bbb')->open();
echo (new Tag('input'))
    ->setAttr('class', 'eee bbb')
    ->addClass('kkk')->open();
echo (new Tag('input'))
    ->setAttr('class', 'eee bbb')
    ->addClass('eee')
    ->open();
echo (new Tag('input'))
    ->addClass('eee')
    ->addClass('bbb')
    ->addClass('eee')
    ->open();

echo (new Tag('input'))
    ->setAttr('class', 'eee zzz kkk')
    ->removeClass('zzz')
    ->open();