<?php
$hostName ="localhost";
$dbUser = "root";
$dbPassword="";
$dbName="marumbi";
$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);
if (!$conn) {
    die("Some thing went wrong");
}
?>