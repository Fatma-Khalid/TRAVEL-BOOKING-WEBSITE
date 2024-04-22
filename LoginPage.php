<?php
session_start();
if (isset( $_SESSION["user"])) {
   header("Location: index.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LoginPage</title>
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
        if (isset($_POST["Login"])) {
            $email=$_POST["email"];
            $password=$_POST["password"];
            require_once "database4.php";
            $sql = "SELECT * FROM traveler WHERE email = '$email'";
            $result = mysqli_query($conn,$sql);
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if ($user) {
                if (password_verify($password, $user["password"])) {
                    session_start();
                    $_SESSION["user"] = "yes";
                header("Location: index.php");
                die();
                }else{
                    echo "<div class = 'alert alert-danger'>Password does not match</div>";
                }
            }else{
                echo "<div class = 'alert alert-danger'>Email does not match</div>";
            }

        }
        ?>
        <form action="LoginPage.php" method="post">
            <div class="form-group">
                <input type="email" placeholder="Enter email" name="email" class="form-control">

            </div>
            <div class="form-group">
                <input type="password" placeholder="Enter password" name="password" class="form-control">
                
            </div>
            <br>
            <div class="form-btn">
              
              <span><input type="submit" class="btn btn-primary" value="Login" name="Login"></span>
           </div>
        </form>
        <br>
        <div>
        <div class="href"><span><p>Already registered <a href="RegistrationPage.php">Register Here</a></p></span></div>
        </div>

        
    </div>
</div>
<br>
<br>
<br>
</body>
</html>