<?php
class TagHelper
{

    public function open($name, $attrs = [])
    {
        $attrsStr = $this->getAttrsStr($attrs);
        return "<$name$attrsStr>";
    }

    public function close($name)
    {
        return "</$name>";
    }

    public function show($name, $text)
    {
        return "<$name>$text</$name>";
    }

    private function getAttrsStr($attrs)
    {
        if (!empty($attrs)) {
            $result = '';

            foreach ($attrs as $attr => $value) {
                if ($value === true) {
                    $result .= " $attr";
                } else {
                    $result .= " $attr=\"$value\"";
                }
            }

            return $result;
        } else {
            return '';
        }
    }
}

$th = new TagHelper();
echo $th->open('div') . 'text' . $th->close('div'); // <div>text</div>

$th = new TagHelper();

echo $th->open('form', ['action' => 'test.php', 'method' => 'GET']);
echo $th->open('input', ['name' => 'year']);
echo $th->open('input', ['type' => 'submit']);
echo $th->close('form');

$th = new TagHelper();
echo $th->show('div', 'Hello World');