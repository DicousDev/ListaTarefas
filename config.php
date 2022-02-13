<?php

// host
$host = 'http://localhost/conteudos/crud-php-mysql-procedural/';

// db
$db_name = 'crud';
$db_host = 'localhost';
$db_user = 'root';
$db_password = '';

// connect at MySQL
try {
    $conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);
} 
catch (\Throwable $th) {
    throw $th;
}
?>