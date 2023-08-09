<?php
define('HOST', 'localhost');
define('DB_NAME', 'user');
define('USER', 'root');
define('PASS', '');

try { 
    $conn = new PDO("mysql:host=" . HOST . ";dbname=" . DB_NAME, USER, PASS);
    $conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
} catch (PDOException $e) {
    echo $e;
}
?>
