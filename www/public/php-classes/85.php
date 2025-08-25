<?php
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

$db = new DatabaseShell('mysql', 'user', 'password', 'mydb');

$db->save('users', ['name' => 'user1', 'age' => 15]);
$db->save('users', ['name' => 'user2', 'age' => 25]);
$db->save('users', ['name' => 'user3', 'age' => 35]);

$user = $db->get('users', 1);
echo print_r($user, true) . "<br>";

$users = $db->getAll('users', [1, 2]);
echo print_r($users, true) . "<br>";

$users = $db->selectAll('users', 'WHERE age > 20');
echo print_r($users, true) . "<br>";

$db->del('users', 3);

$db->delAll('users', [1, 2]);