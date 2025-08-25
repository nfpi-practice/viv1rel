<?php
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

$session = new SessionShell();

$session->set('session1', '1');
$session->set('session2', '2');
print_r($_SESSION);

$session->del('session1');
print_r($_SESSION);