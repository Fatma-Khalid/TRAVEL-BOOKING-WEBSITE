<?php
session_start();
if (isset( $_SESSION["user"])) {
   header("Location: welcome.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="RegistrationPage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>
<body>
  
<div class="header">
<h1><i class="fa-solid fa-plane"></i>&nbsp;&nbsp;TRAVEL EXPLORER</h1>
        <br><br>
    <div class="container">
        <?php
       if(isset($_POST["submit"])){
        $fullname = $_POST["fullname"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $repeat_password= $_POST["repeat_password"];

        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $errors = array();
        if (empty($fullname) OR empty($email)  OR empty($password)  OR empty($repeat_password)  ) {
        array_push($errors,"All fields are required");
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($errors, "Email is not valid");

        }
        if (strlen($password)<8) {
        array_push($errors, "Password require least 8 characters long");
        }
        if ($password!==$repeat_password) {
            array_push($errors, "password does not match");
        }
        require_once "database4.php";
        $sql = "SELECT * FROM traveler WHERE email = '$email' ";
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
         
         $sql = "INSERT INTO traveler(fullname,email,password) VALUES ( ?, ?, ?)";
         $stmt = mysqli_stmt_init($conn);
        $prepareStmt= mysqli_stmt_prepare($stmt, $sql);
        if ( $prepareStmt) {
            mysqli_stmt_bind_param($stmt,"sss",$fullname,$email,$passwordHash);
            mysqli_stmt_execute($stmt);
            echo "<div class ='alert alert-success'>You are registered successfully</div>";
        }else{
            die("something went wrong");
        }
    
        }
       }
        ?>
   
    <form action="RegistrationPage.php" method="post">
            <div class="form-group">
                <input type="text" class="form-control" name="fullname" placeholder="Full Name:">
             </div>
             <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Email:">
             </div>
             <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password:">
             </div>
             <div class="form-group">
                <input type="password"  class="form-control" name="repeat_password" placeholder="Repeat_Password:">
             </div>
             <br>
            
             <div class="form-btn">
              
                <span><input type="submit" class="btn btn-primary" value="Register" name="submit"></span>
             </div>
        </form>
      
        <br>
        <div>
        <div class="href"><span><p>Already registered <a href="LoginPage.php">Login Here</a></p></span></div>
        </div>


    
    </div>
    </div><br><br><br><br><br><br><br>
   
</body>
</html>