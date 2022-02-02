<?php
define('server', 'localhost');
define('user_name', 'projectUser');
define('password', '');
define('database', 'mysqldb');

try{
    $pdo = new PDO("mysql:host=" . server . ";dbname=" . database, user_name, password);
    
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}
?>
