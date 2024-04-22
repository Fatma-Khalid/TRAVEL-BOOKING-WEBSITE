<?php
$hostName ="localhost";
$dbUser = "root";
$dbPassword="";
$dbName="travel-register";
$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);
if (!$conn) {
    die("Some thing went wrong");
}
?>