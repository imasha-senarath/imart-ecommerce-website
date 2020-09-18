<?php

include("../include/connection.php");
$userEmail = $_COOKIE['userEmail'];
$userAddress = $_POST['userAddress'];

$userName = $_POST['userName'];

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $userEmail = htmlentities(mysqli_real_escape_string($_POST['userEmail']));
    echo"<script>alert($userName)</script>";
}



if(isset($userEmail) && isset($userID))
{
    echo"<script>alert($userID )</script>";
    $insertUserDataQuery = "update users set user_email='$userEmail', user_name='$userName', user_address='$userAddress' where user_id = '$userID'";
    echo"<script>alert($userID )</script>";
    $runinsertUserDataQuery = mysqli_query($con, $insertUserDataQuery);
}
else
{
    //echo"<script>window.open('../home.php', '_self')</script>";
}

?>