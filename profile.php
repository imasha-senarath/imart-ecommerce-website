<?php
include("include/connection.php");

$userID = $_COOKIE['userID'];

if(isset($userID))
{
    $getUser = "select * from users where user_id='$userID'";
    $runUser = mysqli_query($con, $getUser);
    $row = mysqli_fetch_array($runUser);
    
    $userEmail = $row['user_email'];
    $userName = $row['user_name'];
    $userImage = $row['user_image'];
    $userAddress = $row['user_address'];
    $userPhone = $row['user_phone'];


    $getOrdersQuery = "select * from orders where user_id='$userID'";
    $runOrdersQuery = mysqli_query($con, $getOrdersQuery);
    $ordersCount = mysqli_num_rows($runOrdersQuery);
   
}
else {
    echo"<script>window.open('home.php', '_self')</script>";
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?php echo"$userName"; ?></title>
    <link rel="stylesheet" href="styles/profile.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <div class="header">
            <div class="header-container">
                <div class="left-side">
                    <h1><a href="home.php">iMart</a></h1>
                </div>
                <div class="right-side">
                    <div class="main-menu">
                        <ul>
                            <li><a>Messages</a></li>
                            <li><a>Orders</a></li>
                            <li><a>Saved</a></li>
                        </ul>
                    </div>
                    <img class="icon cart" src="images/shopping-cart.png" alt="">
                </div>
            </div>
        </div>
        <div class="profile-area">
            <h1 id="title"> Profile</h1>
            <div class="section-one">
                <div class="left">
                    <?php 
                    if(empty($userImage)) {
                        echo" <img src='images/user.png' alt=''>";
                    } else {
                        echo" <img src='storage/users/$userImage' alt=''>";
                    }
                    ?>

                </div>
                <div class="right">
                    <?php
                    echo"
                    <h1> $userName<h1>
                    <h3> $userEmail <h3>
                    "; 
                    ?>
                </div>
            </div>
            <div class="section-two">
                <?php
                if(empty($userAddress)) {
                    echo"<p> <spin  id='left'>Address:</spin> none </p>";
                } else {
                    echo"<p>  <spin  id='left'>Address:</spin> $userAddress </p>";
                }

                if(empty($userPhone)) {
                    echo"<p> <spin  id='left'>Phone:</spin> none </p>";
                } else {
                    echo"<p>  <spin  id='left'>Phone:</spin> $userPhone </p>";
                }
                ?>

            </div>
            <button type='button' onclick='editProfile()'> Edit Profile </button>
        </div>

        <div class='orders-area'>
            <h1 id='title'> Orders</h1>
            <div class='orders'>
                <?php
                if($ordersCount > 0) 
                {
                    while($rowOrders = mysqli_fetch_array($runOrdersQuery)) {
                    $productID = $rowOrders['product_id'];
                    $orderID = $rowOrders['order_id'];
                    $orderDateTime = $rowOrders['order_date'];

                    $orderDateTimepieces = explode(" ", $orderDateTime);

                    $getProductQuery = "select * from products where product_id='$productID'";
                    $runGetProductQuery = mysqli_query($con, $getProductQuery);
                    $rowProduct = mysqli_fetch_array($runGetProductQuery);
                    
                    $productName = $rowProduct['product_name'];
                    $productImage = $rowProduct['product_image'];

                    echo"
                   
                        <div class='section' onclick=location.href='view-order.php?order_id=$orderID'>
                            <img src='storage/products/$productImage'>
                            <p id='name'> $productName </p>
                            <p id='id'> #$orderID </p>
                            <p id='date'> $orderDateTimepieces[0] </p>
                        </div>
                     
                    ";
                }
                } else {
                echo"
                    <p id='emptyOrders'> No Orders</p>
                ";
                }
                ?>
            </div>
        </div>

    </div>
    <script src="jquery/jquery-3.5.1.min.js"></script>
    <script src="scripts/profile.js"></script>
</body>

</html>