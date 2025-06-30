<?php
phpinfo();

try {
    $pdo = new PDO(
        'mysql:host=mysql_con;dbname=mydb',
        'user',
        'password'
    );
    echo "<h2>MySQL connection successful!</h2>";
} catch (PDOException $e) {
    echo "<h2>MySQL connection failed: " . $e->getMessage() . "</h2>";
}
?>