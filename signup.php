<?php
    include("include/connection.php");

    //mysql database error handling
    if (mysqli_connect_errno()) {
        echo "<script>alert('Failed to connect to database!');</script>";
    }

    if(isset($_POST['signup_btn'])){
       
        $userName = htmlentities(mysqli_real_escape_string($con,$_POST['userName']));
        $userEmail = htmlentities(mysqli_real_escape_string($con,$_POST['userEmail']));
        $userPassword = htmlentities(mysqli_real_escape_string($con,$_POST['userPassword']));
        
        $check_email = "select * from users where user_email = '$userEmail'";
        $run_email = mysqli_query($con,$check_email);
        $check = mysqli_num_rows($run_email);

        if(empty($userName) || empty($userEmail) || empty($userPassword)){
            $_SESSION["error"] = "Fields can not be empty.";
        }
        else if($check == 1){
            $_SESSION["error"] = "Email already exist.";
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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iMart - Sign Up</title>
    <link rel="stylesheet" href="styles/login-signup.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <script src="scripts/cookies-manage.js"></script>
</head>

<body>
    <div class="wrapper">
        <div class="header">
            <div class="header-container">
                <div class="left-side">
                    <h1><a href="home.php">iMart</a></h1>
                </div>
                <div class="right-side">
                    <a href="login.php">Login</a>
                </div>
            </div>
        </div>
        <div class="main-box">
            <h1>Get Started with iMart</h1>
            <form method="post" class="form" action="">

                <input type="text" placeholder="username" name="userName">
                <input type="email" placeholder="email" name="userEmail">
                <input type="password" placeholder="password" name="userPassword">

                <?php if(isset($_SESSION["error"])) {?>
                <p class="error"><?=$_SESSION["error"]?></p>
                <?php unset($_SESSION["error"]);}?>

                <button type="submit" name="signup_btn">Sign Up</button>

            </form>
            <p>By clicking signup button, you agree to our Terms of Services and Privacy Policy.</p>
        </div>
    </div>
</body>

</html>