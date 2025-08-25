<?php

class Tag
{
    private $name;
    private $attrs = [];
    private $text = '';

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getText()
    {
        return $this->text;

    }

    public function getAttrs()
    {
        return $this->attrs;
    }

    public function getAttr($name)
    {
        return $this->attrs[$name] ?? null;
    }

    public function show()
    {
        return $this->open() . $this->text . $this->close();
    }

    public function setAttr($name, $value = true)
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

    public function setText($text)
    {
        $this->text = $text;
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

class Checkbox extends Tag
{
    public function __construct()
    {
        $this->setAttr('type', 'checkbox');
        $this->setAttr('value', 1);
        parent::__construct('input');
    }

    public function open()
    {
        $name = $this->getAttr('name');

        if ($name) {
            $hidden = (new Hidden)
                ->setAttr('name', $name)
                ->setAttr('value', 0);

            if (isset($_REQUEST[$name])) {
                $value = $_REQUEST[$name];

                if ($value == 1) {
                    $this->setAttr('checked');
                } else {
                    $this->removeAttr('checked');
                }
            }

            return $hidden->open() . parent::open();
        } else {
            return parent::open();
        }
    }

    public function __toString()
    {
        return $this->open();
    }
}

class Radio extends Checkbox
{
    public function __construct()
    {
        parent::__construct();
        $this->setAttr('type', 'radio');
    }

    public function __toString()
    {
        return $this->open();
    }
}

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

class CookieShell
{
    public function set($name, $value, $time)
    {
        setcookie($name, $value, time() + $time);
        $_COOKIE[$name] = $value;
    }

    public function get($name)
    {
        return $_COOKIE[$name];
    }

    public function del($name)
    {
        if ($this->exists($name)) {
            setcookie($name, '', time());
            $_COOKIE[$name] = '';
        }
    }

    public function exists($name)
    {
        return isset($_COOKIE[$name]);
    }
}

class SessionShell
{
    public function __construct()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
    }

    public function set($name, $value)
    {
        $_SESSION[$name] = $value;
    }

    public function get($name)
    {
        return $_SESSION[$name];
    }

    public function del($name)
    {
        unset($_SESSION[$name]);
    }

    public function exists($name)
    {
        return isset($_SESSION[$name]);
    }

    public function destroy()
    {
        session_destroy();
    }
}

class FileManipulator
{
    public function create($filePath)
    {
        file_put_contents($filePath, '');
    }

    public function delete($filePath)
    {
        unlink($filePath);
    }

    public function copy($filePath, $copyPath)
    {
        copy($filePath, $copyPath);
    }

    public function rename($filePath, $newName)
    {
        rename($filePath, pathinfo($filePath, PATHINFO_DIRNAME) . "/" . $newName);
    }

    public function replace($filePath, $newPath)
    {
        rename($filePath, $newPath);
    }

    public function weigh($filePath)
    {
        return filesize($filePath);
    }
}

class Validator
{
    public function isEmail($str)
    {
        return (bool)filter_var($str, FILTER_VALIDATE_EMAIL);
    }

    public function isDomain($str)
    {
        return (bool)filter_var($str, FILTER_VALIDATE_DOMAIN);
    }

    public function inRange($num, $from, $to)
    {
        return ($num >= $from && $num <= $to);
    }

    public function inLength($str, $from, $to)
    {
        return (mb_strlen($str) >= $from && mb_strlen($str) <= $to);
    }
}

class DatabaseShell
{
    private $link;

    public function __construct($host, $user, $password, $database)
    {
        $this->link = mysqli_connect($host, $user, $password, $database);
        mysqli_query($this->link, "SET NAMES 'utf8'");
    }

    public function save($table, $data)
    {
        $columns = implode(',', array_keys($data));
        $values = "'" . implode("', '", array_values($data)) . "'";

        mysqli_query($this->link, "INSERT INTO $table ($columns) VALUES ($values)");
    }

    public function del($table, $id)
    {
        mysqli_query($this->link, "DELETE FROM $table WHERE id = $id");
    }

    public function delAll($table, $ids)
    {
        foreach ($ids as $id) {
            $this->del($table, $id);
        }
    }

    public function get($table, $id)
    {
        return mysqli_fetch_assoc(mysqli_query($this->link, "SELECT * FROM $table WHERE id = $id"));
    }

    public function getAll($table, $ids)
    {
        $users = [];

        foreach ($ids as $id) {
            $users[] = $this->get($table, $id);
        }

        return $users;
    }

    public function selectAll($table, $condition)
    {
        $sql = mysqli_query($this->link, "SELECT * FROM {$table} {$condition}");

        while ($row = mysqli_fetch_assoc($sql)) {
            $users[] = $row;
        }

        return $users;
    }
}