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
    <link rel="stylesheet" href="styles/home.css">
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
                            if(empty($userImage)){
                                echo"<img id='dp' src='images/user.png' alt='' onclick='viewProfile()'>";
                            } else{
                                echo"<img id='dp' src='storage/users/$userImage' alt=''style='border-radius: 50px;' onclick='viewProfile()'/>";
                            }
                        }
                        else {
                            echo"<img id='dp' src='images/user.png' alt='' onclick='viewProfile()'>";
                        }
                        ?>
                </div>
            </div>
        </div>

        <div class="banners">
            <div class="slide-show">
                <div class="slide">
                    <img src="images/cover1.webp" alt="">
                </div>
                <div class="slide">
                    <img src="images/cover2.webp" alt="">
                </div>
                <div class="slide">
                    <img src="images/cover3.webp" alt="">
                </div>
            </div>
            <div class="dot-container">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>

        <div class="features">
            <div class="section">
                <img src="images/fast-delivery.png" alt="">
                <h1>Fast Delivery</h1>
            </div>
            <div class="section">
                <img src="images/money-return.png" alt="">
                <h1>Money Return</h1>
            </div>
            <div class="section">
                <img src="images/support.png" alt="">
                <h1>Online Support</h1>
            </div>
            <div class="section">
                <img src="images/security.png" alt="">
                <h1>Payement Security</h1>
            </div>
        </div>

        <div class="exclusive-products">
            <h1>Exclusive Products</h1>
            <div class=" container">
                <?php
                    while($rowProduct = mysqli_fetch_array($runProduct)){
                        $productImage = $rowProduct['product_image'];
                        $productName = $rowProduct['product_name'];
                        $productPrice = $rowProduct['product_price'];
                        $productID = $rowProduct['product_id'];

                        echo"
                            <div class='section' onclick=location.href='view-product.php?product_id=$productID'>
                                <img src='storage/products/$productImage' alt=''>
                                <h1>$productName</h1>
                                <h2>Rs $productPrice</h2>
                            </div>
                        ";
                    }
                ?>
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
<script src="scripts/cookies-manage.js"></script>

</html>