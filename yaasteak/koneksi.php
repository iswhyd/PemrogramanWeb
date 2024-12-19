<?php

$servername = "localhost";
$database = "yaasteak";
$username = "root";
$password = "";
$port = 3306 ;

$conn = mysqli_connect($servername, $username, $password, $database, $port);

if (!$conn) {
    die("koneksi gagal " . mysqli_connect_error());
} else {
    echo "";
}
