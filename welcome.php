<!DOCTYPE html>

<?php
include("include/connection.php");

$userID = $_COOKIE['userID'];

if(isset($userID))
{
    $getUser = "select * from users where user_id='$userID'";
    $runUser = mysqli_query($con, $getUser);
    $row = mysqli_fetch_array($runUser);
    $userName = $row['user_name'];
    $userImage = $row['user_image'];
}

//get products data
$getProduct = "select * from products LIMIT 8";
$runProduct = mysqli_query($con, $getProduct);
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iMart | Home</title>
    <link rel="stylesheet" href="styles/basic.css">
    <link rel="stylesheet" href="styles/welcome.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
</head>

<body>
    <div class="wrapper">

        <div class="header-container">
            <div class="header">
                <h1 onclick="location.href='home.php'">iMart</h1>
            </div>
        </div>

        <div class="main-container">
            <div class="login">
                <h1>Welcome Back</h1>
                <form id="loginForm" method="post" class="form" action="">

                    <input type="text" placeholder="Email" name="userEmail">
                    <input type="text" placeholder="Password" name="userPassword">

                    <?php if(isset($_SESSION["error"])) {?>
                    <p class="error"><?=$_SESSION["error"]?></p>
                    <?php unset($_SESSION["error"]);}?>

                    <button type="submit" name="login_btn">Login</button>
                </form>
            </div>
            <div class="signup">
                <h1>Get Started with iMart</h1>
                <form id="signupForm" method="post" class="form" action="">

                    <input type="text" placeholder="Username" name="userName">
                    <input type="email" placeholder="Email" name="userEmail">
                    <input type="password" placeholder="Password" name="userPassword">

                    <?php if(isset($_SESSION["error"])) {?>
                    <p class="error"><?=$_SESSION["error"]?></p>
                    <?php unset($_SESSION["error"]);}?>

                    <button type="submit" name="signup_btn">Sign Up</button>

                </form>
                <p>By clicking signup button, you agree to our Terms of Services and Privacy Policy.</p>
            </div>
        </div>


        <div class="footer-container">
            <div class="footer">
                <div class="designer">
                    <h1>Designed by</h1>
                    <img src="images/full-logo.png">
                </div>
                <p>Copyright ©2020 iMart All rights reserved.</p>
            </div>
        </div>

    </div>
</body>

<script src="jquery/jquery-3.5.1.min.js"></script>
<script src="scripts/home.js"></script>

</html>