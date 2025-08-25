<?php
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

$csh = new CookieShell;

if ($csh->exists('loginCount')) {
    $count = $csh->get('loginCount');
    $csh->set('loginCount', ++$count, 3600 * 24);
} else {
    $csh->set('loginCount', 1, 3600 * 24);
}

echo $csh->get('loginCount');