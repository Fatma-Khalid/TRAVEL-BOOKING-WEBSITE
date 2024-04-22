<?php
session_start();
if (!isset( $_SESSION["user"])) {
   header("Location: LoginPage.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>TRAVEL EXPLORER</title>
    <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="main">
            <div class="navbar">
                <div class="icon">
                    <h2 class="logo">TRAVEL EXPLORER</h2>
                </div>
                <br>
                <br>
                <div class="menu">
                    <ul>
                        
                        <li><a href="Home1.php">HOME</a></li>
                        <li><a href="About.html">ABOUT</a></li>
                        <li><a href="blog.html">CONTACT </a></li>
                        <li> <a href="Logout.php">LOGOUT</a></li>
                    </ul>

                </div>
                <div class="content">
                    <p>Welcome to our travel website, where your journey begins with endless possibilities and unforgettable adventures.<br> Whether you're dreaming of pristine beaches, historic landmarks, or bustling cities, our platform offers a gateway<br> to explore the world's wonders. From curated travel guides to personalized recommendations, we are here to inspire, <br>guide, and enhance your travel experience every step of the way. Embark on a voyage of discovery with us and let<br> your wanderlust take flight.</p><br><br>
                    <div class="cn">
                    <a href=" http://localhost:4200/">DISCOVER MORE</a>
                </div>
               
                        </div>
                        

                </div>               
               
            
            
           
             </div>
            </div>
         </div>
    </body>
