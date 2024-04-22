<?php session_start();   ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BOOKING</title>
</head>
<link rel="stylesheet" href="booking.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<body>
<div class="header">
        <h1><i class="fa-solid fa-plane"></i>&nbsp;&nbsp;TRAVEL EXPLORER</h1>
                <br><br><br> <br><br><br>  

                <div class="container">
                    <div class="pic">
                        <img src="../zanzibar hotel/hot10.jpg" alt="">
                    </div>
                 <br>
                 <h4>MARUMBI RESORT
                 </h4>
                    <div class="head">
                   <h1>&nbsp;&nbsp;&nbsp;&nbsp;BOOKING FORM</h1>
                  
                  
        <?php
      

       if(isset($_POST["submit"])){
        $fullname = $_POST["fullname"];
        $phone = $_POST["phone"];
        $email = $_POST["email"];
        $address = $_POST["address"];
        $payment= $_POST["payment"];
        $dateIn= $_POST["dateIn"];
        $dateOut = $_POST["dateOut"];

       
        $errors = array();
        if (empty($fullname) OR empty($phone)  OR empty($email)  OR empty($address) OR empty($payment) OR empty($dateIn) OR empty($dateOut)  ) {
        array_push($errors,"All fields are required");
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($errors, "Email is not valid");

        }
      
        require_once "marumbibooking.php";
        $sql = "SELECT * FROM marumbidata WHERE email = '$email' ";
        $result = mysqli_query($conn,$sql);
        $rowCount = mysqli_num_rows($result);
        if($rowCount>0) {
            array_push($errors, "The email already exist");
        }
        if (count($errors)>0) {
            foreach ($errors as $error){
                echo " <div class='alert alert-danger'>$error</div>";
            }
        } else{
         
         $sql = "INSERT INTO marumbidata(fullname,phone,email,address,payment,dateIn,dateOut) VALUES ( ?, ?, ?, ?, ?, ?, ?)";
         $stmt = mysqli_stmt_init($conn);
        $prepareStmt= mysqli_stmt_prepare($stmt, $sql);
        if ( $prepareStmt) {
            mysqli_stmt_bind_param($stmt,"sssssss",$fullname,$phone,$email,$address,$payment,$dateIn,$dateOut);
            mysqli_stmt_execute($stmt);
            echo "<div class ='alert alert-success'>Booking successfully</div>";
        }else{
            die("something went wrong");
        }
    
        }
       }
        ?>




    <form action="marumbi.php" method="post">
            <div class="form-group">
                <input type="text" class="form-control" name="fullname" placeholder="Full Name:">
             </div>
             <div class="form-group">
                <input type="text" class="form-control" name="phone" placeholder="Phone:">
             </div>
             <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Email:">
             </div>
             <div class="form-group">
                <input type="text"  class="form-control" name="address" placeholder="Address:">
             </div>
             <div class="form-group">
             <select class="form-control" id="pay" name="payment">
            <option value="credit">Credit Card</option>
             <option value="paypal">PayPal</option>
             <option value="debit">Debit Card</option>
             <option value="bank">Bank Transfer</option>
             <option value="cash">Cash</option>
             </select>
             </div>
             <div class="form-group">
                <input type="date" class="form-control" name="dateIn" placeholder="Check In Date:">
             </div>
             <div class="form-group">
                <input type="date" class="form-control" name="dateOut" placeholder="Check-Out-Date:">
             </div>
             
             <br>
            
             <div class="form-btn">
              <div class="bt">
                <span><input type="submit" class="btn btn-primary" value="Book" name="submit"></span>
              </div>
            
                </div>
             </div>
        </form><br>
        
    </div>


   
    <div class="container">
    <?php 
    if (isset($_SESSION['status'])) {
        echo "<h4>" .$_SESSION['status']. "<h4>";
        unset($_SESSION['status']);
    }
    ?>
        <div class="head">
            <h1>CANCEL BOOKING</h1>
            <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;  If you want to cancel your booking enter your Email Below:</p>
            </div>
            <form action="marumbicancel.php" method="post">
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Email:">
             </div>
             <div class="form-btn">
              <div class="bt">
                <span><input type="submit" class="btn btn-primary" value="cancel" name="cancel"></span>
              </div>
            </form>
        </div>

   
       </div>
       <div class="top">
        <p>Privacy Policy|Terms of Use|Contact support<br>
        Coppyright &copy;. All Rights are reserved | Designed by BITA-Group-6<br><i class="fa-brands fa-twitter"></i>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa-brands fa-facebook"></i>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa-brands fa-instagram"></i>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa-brands fa-whatsapp"></i></p>
       
     </div>
    </div>
   
    </div><br><br><br><br><br><br><br>
   
</body>
</html>