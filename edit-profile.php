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
    $userEmail = $row['user_email'];
    $userImage = $row['user_image'];
    $userAddress = $row['user_address'];
    $userPhone = $row['user_phone'];
    $userID = $row['user_id'];
}
else
{
    echo"<script>window.open('login.php', '_self')</script>";
}


if(isset($_POST['userName']))
{
    $userImage = $_FILES['userImage']['name'];
    $userImageTemp = $_FILES['userImage']['tmp_name'];
    $userName = htmlentities(mysqli_real_escape_string($con, $_POST['userName']));
    $userEmail = htmlentities(mysqli_real_escape_string($con, $_POST['userEmail']));
    $userAddress = htmlentities(mysqli_real_escape_string($con, $_POST['userAddress']));
    $userPhone = htmlentities(mysqli_real_escape_string($con, $_POST['userPhone']));
   
    $randomName = date("YmdHis");

    if(strlen($userImage) >= 1) {
        move_uploaded_file($userImageTemp, "storage/users/$randomName-$userImage");

        $updateUserDataQuery = "update users set user_email='$userEmail', user_name='$userName', user_phone='$userPhone', user_address='$userAddress', user_image='$randomName-$userImage' where user_id = '$userID'";
        $runinsertUserDataQuery = mysqli_query($con, $updateUserDataQuery);
    }
    else {
        $updateUserDataQuery = "update users set user_email='$userEmail', user_name='$userName', user_phone='$userPhone', user_address='$userAddress' where user_id = '$userID'";
        $runinsertUserDataQuery = mysqli_query($con, $updateUserDataQuery);
    }

    echo"<script>window.open('profile.php', '_self')</script>";
}


?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iMart</title>
    <link rel="stylesheet" href="styles/edit-profile.css">
    <link rel="stylesheet" href="styles/basic.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <div class="header-container">
            <div class="header">
                <div class="left-side">
                    <h1 onclick="location.href='home.php'">iMart</h1>
                </div>
                <div class="center-menu">

                </div>
                <div class="right-side">

                </div>
            </div>
        </div>

        <div class="workplace">

            <h1 id="title"> Edit Profile</h1>
            <p id="des"> Add your details to profile.</p>
            <form id="editProfileForm" name="editProfileForm" method="post" enctype="multipart/form-data">
                <div class='section-one'>
                    <?php 
                
                if(empty($userImage)) {
                    echo"<img id='img-preview' src='images/user.png' alt=''>";
                }
                else {
                    echo"<img id='img-preview' src='storage/users/$userImage' alt=''>";
                }
               ?>
                    <div class='buttons'>
                        <button type="button" onclick='clickFileBtn()'>Add Photo</button>
                        <input id='userImage' type='file' name='userImage' onchange='loadfile(event)'>
                        <button>Remove Photo</button>
                    </div>
                    <p id="imageError" class='error'> Name cannot be empty.</p>
                </div>

                <div class='section section-two'>
                    <div class='left'>
                        <h1> Name </h1>
                        <?php echo"<input type='text' id='userName' name='userName' value='$userName' placeholder='Enter your name'>"?>
                        <p id="nameError" class='error'> Name cannot be empty.</p>
                    </div>
                    <div class='right'>
                        <h1> Email </h1>
                        <?php echo"<input id='userEmail' type='email' name='userEmail' value='$userEmail' placeholder='Enter your email'>"?>
                        <p id="emailError" class='error'> Email cannot be empty.</p>
                    </div>
                </div>

                <div class='section section-three'>
                    <h1> Address </h1>
                    <?php echo"<input id='userAddress' type='address' name='userAddress' value='$userAddress' placeholder='Enter your address'>"?>
                    <h1> Phone </h1>
                    <?php echo"<input id='userPhone' type='text' name='userPhone' value='$userPhone' placeholder='Enter your phone number'>"?>
                </div>
            </form>
            <button id='saveBtn' onClick='editProfileDataValidation()'> Save </button>
            <div id="saveProfileLoader"></div>

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
    <script src="jquery/jquery-3.5.1.min.js"></script>
    <script src="scripts/edit-profile.js"></script>
</body>

</html>