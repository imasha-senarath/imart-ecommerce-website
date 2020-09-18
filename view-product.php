<!DOCTYPE html>

<?php
include("include/connection.php");

$productID = $_GET["product_id"];
if(!isset($productID))
{
    echo"<script>window.open('home.php', '_self')</script>";
}

//geting product data
$getProduct = "select * from products where product_id='$productID'";
$runProduct = mysqli_query($con, $getProduct);
$rowProduct = mysqli_fetch_array($runProduct);
$productName = $rowProduct['product_name'];
$productImage = $rowProduct['product_image'];
$productDes = $rowProduct['product_des'];
$productPrice = $rowProduct['product_price'];

$userEmail = $_COOKIE['userEmail'];
if(isset($userEmail))
{
    $getUser = "select * from users where user_email='$userEmail'";
    $runUser = mysqli_query($con, $getUser);
    $rowUser = mysqli_fetch_array($runUser);
    $userName = $rowUser['user_name'];
}

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iMart</title>
    <link rel="stylesheet" href="styles/view-product.css">
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
                            <li class="yy"><a>Messages</a></li>
                            <li><a>Orders</a></li>
                            <li><a>Saved</a></li>
                        </ul>
                    </div>
                    <form method="POST" class="search-bar" action="">
                        <input type="search" placeholder="Search Items">
                        <button name="gooo">GO</button>
                    </form>

                    <div class="profile-area">
                        <img class="icon cart" src="images/shopping-cart.png" alt="">
                        <img class="icon user" src="images/profile.png" alt="">
                        <div class="dropdown">
                            <div class="dropdown-content">
                                <?php
                                    if(isset($userEmail))
                                    {
                                        echo"
                                        <h1 class='profile-button' onclick='viewProfile()'>Hello, $userName</h1>
                                        <button onclick='logout()'>Logout</button>
                                        ";
                                    }
                                    else {
                                        echo"
                                        <h1>Welcome to iMart</h1>
                                        <button onclick='login()'>Login</button>
                                        <button onclick='signup()'>Signup</button>
                                        ";
                                    }
                                 ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="product-container">
            <div class="image">
                <?php echo"<img src='storage/products/$productImage' alt=''>"?>
            </div>
            <div id="ee" class="details">
                <?php echo"<h1>$productName</h1>"?>
                <?php echo"<h2>Rs $productPrice</h2>"?>
                <?php echo"<p>$productDes</p>"?>
                <div class="buttons">
                    <?php echo"<button id='buy_btn' class='buy' onclick=location.href='checkout.php?product_id=$productID'>Buy</button>"?>
                    <?php echo"<button id='adcart_btn' class='adcart' onClick='addToCart($productID ,\"$productName\")'>Add to Cart</button>"?>
                </div>
                <div id="cartSucess"></div>
            </div>
        </div>
    </div>
</body>
<script src="jquery/jquery-3.5.1.min.js"></script>
<script src="scripts/view-product.js"></script>

</html>