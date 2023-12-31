<?php

$host = 'localhost';
$username = 'root';
$password = '';
$database = 'rumah_sakit';

$mysqli = mysqli_connect($host, $username, $password, $database)or die(mysqli_error($mysqli));

// Testing Connect Mysql
/* if (!$mysqli) {
    die("Gagal terhubung dengan database: " . mysqli_connect_error());
} else {
    echo "Database terhubung";
} */

?>