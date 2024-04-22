<?php
session_start();
$con = mysqli_connect("localhost","root","","paje");

if (isset($_POST['cancel'])) {
$email = $_POST['email']; 
$query ="UPDATE pajedata SET payment='cancelled' WHERE email = '$email'";
$query_run = mysqli_query($con, $query);

if ($query_run) {
    $_SESSION['status'] = "Booking cancelled successfully";
    header("Location: paje.php");
}
else{
    $_SESSION['status'] = "Booking  Not cancelled ";
    header("Location: paje.php");
}

}
?>