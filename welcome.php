<!DOCTYPE html>

<?php
include("include/connection.php");

if(isset($_POST['userLoginEmail'])) {
    $userEmail = htmlentities(mysqli_real_escape_string($con, $_POST['userLoginEmail']));
    $userPassword = htmlentities(mysqli_real_escape_string($con, $_POST['userLoginPassword']));

    $selectUser = "select * from users where user_email='$userEmail' AND user_password='$userPassword'";
    $query = mysqli_query($con, $selectUser);
    $check = mysqli_num_rows($query);

    if($check == 1) {
        $row = mysqli_fetch_array($query);
        $userID = $row['user_id'];
        setcookie("userID", $userID, time() + (86400 * 7));
        echo"<script>window.open('home.php', '_self')</script>";
    } 
    else {
        echo"<script> alert('Wrong email or password.') </script>";
    }
}

if(isset($_POST['signupEmail'])){
       
    $userName = htmlentities(mysqli_real_escape_string($con,$_POST['signupName']));
    $userEmail = htmlentities(mysqli_real_escape_string($con,$_POST['signupEmail']));
    $userPassword = htmlentities(mysqli_real_escape_string($con,$_POST['signupPassword']));
    
    $check_email = "select * from users where user_email = '$userEmail'";
    $run_email = mysqli_query($con,$check_email);
    $check = mysqli_num_rows($run_email);

    if($check == 1){
        //$_SESSION["error"] = "Email already exist.";
        echo"<script> alert('Email already exist') </script>";
    }

    if (isset($userName) && isset($userEmail) && isset($userPassword) && $check != 1){

        function generateRandomString() {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < 15; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;
        }

        $userID = generateRandomString();
   
        $insert = "insert into users (user_id, user_name, user_email, user_password) values ('$userID', '$userName','$userEmail', '$userPassword')";
        $query = mysqli_query($con, $insert);

        setcookie("userID", $userID, time() + (86400 * 7));
        echo"<script>window.open('home.php', '_self')</script>";
    }
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iMart</title>
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

                    <input id="loginEmail" type="text" placeholder="Email" name="userLoginEmail">
                    <input id="loginPassword" type="text" placeholder="Password" name="userLoginPassword">
             
                    <p class="error login-error">Error</p>
         
                    <button id="login-btn" type="button" name="login_btn">Login</button>
                </form>
            </div>

            <div class="signup">
                <h1>Get Started with iMart</h1>
                <form id="signupForm" method="post" class="form" action="">

                    <input id="signupName" type="text" placeholder="Username" name="signupName">
                    <input id="signupEmail" type="signupEmail" placeholder="Email" name="signupEmail">
                    <input id="signupPassword" type="signupPassword" placeholder="Password" name="signupPassword">

                    <p class="error signup-error">Error</p>

                    <!--<?php //if(isset($_SESSION["error"])) {?>
                    <p class="error"><?//=$_SESSION["error"]?></p>
                    <?php //unset($_SESSION["error"]);}?>-->

                    <button id="signup-btn" type="button" name="signup_btn">Sign Up</button>

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
<script src="scripts/welcome.js"></script>

</html>