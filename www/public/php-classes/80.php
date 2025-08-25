<?php
require_once 'classes.php';

class FormHelper extends TagHelper
{
    public function openForm($attrs = [])
    {
        return $this->open('form', $attrs);
    }

    public function closeForm()
    {
        return $this->close('form');
    }

    public function input($attrs = [])
    {
        if (isset($attrs['name'])) {
            $name = $attrs['name'];

            if (isset($_REQUEST[$name])) {
                $attrs['value'] = $_REQUEST[$name];
            }
        }

        return $this->open('input', $attrs);
    }

    public function password($attrs = [])
    {
        $attrs['type'] = 'password';
        return $this->input($attrs);
    }

    public function hidden($attrs = [])
    {
        $attrs['type'] = 'hidden';
        return $this->open('input', $attrs);
    }

    public function submit($attrs = [])
    {
        $attrs['type'] = 'submit';
        return $this->open('input', $attrs);
    }

    public function checkbox($attrs = [])
    {
        $attrs['type'] = 'checkbox';
        $attrs['value'] = 1;

        if (isset($attrs['name'])) {
            $name = $attrs['name'];

            if (isset($_REQUEST[$name]) and $_REQUEST[$name] == 1) {
                $attrs['checked'] = true;
            }

            $hidden = $this->hidden(['name' => $name, 'value' => '0']);
        } else {
            $hidden = '';
        }

        return $hidden . $this->open('input', $attrs);
    }

    public function textarea($attrs = [])
    {
        $result = "";
        if (isset($attrs['name'])) {
            $name = $attrs['name'];
            if (isset($_REQUEST[$name])) {
                $result = $_REQUEST[$name];
            }
        }
        return $this->open('textarea', $attrs) . $result . $this->close('textarea');
    }

    public function select($attrs = [], $attributes = [])
    {
        $result = '';
        $name = $attrs['name'] ?? null;

        foreach ($attributes as $attr) {
            $text = $attr['text'];
            $optionAttrs = $attr['attrs'];

            if (($optionAttrs['value'] ?? null) == ($_REQUEST[$name] ?? null)) {
                $optionAttrs['selected'] = true;
            } elseif (isset($optionAttrs['selected'])) {
                $optionAttrs['selected'] = true;
            }

            $result .= $this->open('option', $optionAttrs) . htmlspecialchars($text) . $this->close('option');
        }

        return $this->open('select', $attrs) . $result . $this->close('select');
    }
}

$fh = new FormHelper();

echo $fh->openForm(['action' => '', 'method' => 'GET']);
echo $fh->input(['name' => 'year']);
echo $fh->checkbox(['name' => 'check']);
echo $fh->textarea(['name' => 'check']);
echo $fh->select(
    ['name' => 'list', 'class' => 'eee'],
    [
        ['text' => 'item1', 'attrs' => ['value' => '1']],
        ['text' => 'item2', 'attrs' => ['value' => '1', 'selected' => true]],
        ['text' => 'item3', 'attrs' => ['value' => '3', 'class' => 'last']],
    ]
);
echo $fh->submit();
echo $fh->closeForm();