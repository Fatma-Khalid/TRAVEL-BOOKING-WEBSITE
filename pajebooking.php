<?php
$hostName ="localhost";
$dbUser = "root";
$dbPassword="";
$dbName="paje";
$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);
if (!$conn) {
    die("Some thing went wrong");
}
?>