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

$userID = $_COOKIE['userID'];
if(isset($userID))
{
    $getUser = "select * from users where user_id='$userID'";
    $runUser = mysqli_query($con, $getUser);
    $row = mysqli_fetch_array($runUser);
    $userName = $row['user_name'];
    $userImage = $row['user_image'];
}

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iMart</title>
    <link rel="stylesheet" href="styles/view-product.css">
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
                    <img id="cart" src="images/shopping-cart.png" onclick="cart()" alt="">
                    <?php
                        if(isset($userID))
                        {
                            echo"<img id='dp' src='storage/users/$userImage' alt=''style='border-radius: 50px;' onclick='viewProfile()'/>";
                        }
                        else {
                            echo"<img id='dp' src='images/user.png' alt='' onclick='viewProfile()'>";
                        }
                        ?>
                </div>
            </div>
        </div>

        <div class="product">
            <div class="image">
                <?php echo"<img src='storage/products/$productImage' alt=''>"?>
            </div>
            <div class="details">
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
<script src="scripts/view-product.js"></script>
<script src="scripts/basic.js"></script>

</html>