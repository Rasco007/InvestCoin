<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', null);
define('DB_DATABASE', 'investcoin');
$connection = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

function connect() {
    $host='localhost';
    $user='root';
    $pass='';
    $db='investcoin';
  
    return new PDO("mysql:host={$host};dbname={$db}", $user, $pass);
  }
?>