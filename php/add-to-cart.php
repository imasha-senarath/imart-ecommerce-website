<?php

include("../include/connection.php");
$userID = $_COOKIE['userID'];
$productID = $_POST['productID'];
$productName = $_POST['productName'];

if(isset($userID))
{
    $insertCartQuery = "insert into carts (user_id, product_id) values ('$userID', '$productID')";
    $runInsertCart = mysqli_query($con, $insertCartQuery);
    echo"<p class='cart-success'> $productName added to cart. </p>";
}
else
{
    echo"<script>window.open('../shopping-web-site/login.php', '_self')</script>";
}

?>