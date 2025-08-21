<?php
$hostName = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "zanda";

$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);
$con = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);
if (!$conn) {
    die("Bağlantı sırasında bir hata oluştu;");
}
?>