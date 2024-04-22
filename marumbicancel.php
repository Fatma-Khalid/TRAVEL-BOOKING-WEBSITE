<?php
session_start();
$con = mysqli_connect("localhost","root","","marumbi");

if (isset($_POST['cancel'])) {
$email = $_POST['email']; 
$query ="UPDATE marumbidata SET payment='cancelled' WHERE email = '$email'";
$query_run = mysqli_query($con, $query);

if ($query_run) {
    $_SESSION['status'] = "Booking cancelled successfully";
    header("Location: marumbi.php");
}
else{
    $_SESSION['status'] = "Booking  Not cancelled ";
    header("Location: marumbi.php");
}

}
?>