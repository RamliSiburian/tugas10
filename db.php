<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "arkademy";

$conn = mysqli_connect($host, $user, $pass, $db);
if (mysqli_connect_errno()) {
    echo "Koneksi error" . mysqli_connect_error();
}
