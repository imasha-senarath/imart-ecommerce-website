<?php

include("../include/connection.php");
$userID = $_COOKIE['userID'];
$productID = $_POST['productID'];
$productName = $_POST['productName'];

if(isset($userID) && isset($productID))
{
    $orderID = rand(111111111,999999999);
    
    $insertOrderQuery = "insert into orders (order_id, user_id, product_id, order_date, order_status) values ('$orderID', '$userID', '$productID', NOW(), 'pending')";
    $runInsertOrder = mysqli_query($con, $insertOrderQuery);
    echo"<p class='cart-success'> $productName order complete. </p>";
}
else
{
    echo"<script>window.open('../shopping-web-site/login.php', '_self')</script>";
}

?>