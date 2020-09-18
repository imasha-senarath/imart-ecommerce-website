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
}

//get products data
$getProduct = "select * from products LIMIT 8";
$runProduct = mysqli_query($con, $getProduct);

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iMart</title>
    <link rel="stylesheet" href="styles/home.css">
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
                            <li><a class="yy">Messages</a></li>
                            <li><a>Orders</a></li>
                            <li><a>Saved</a></li>
                        </ul>
                    </div>
                    <form method="POST" class="search-bar" action="">
                        <input type="search" placeholder="Search Items">
                        <button name="gooo">GO</button>
                    </form>

                    <div class="profile-area">
                        <img class="icon cart" src="images/shopping-cart.png" onclick="cart()" alt="">
                        <img class="icon user" src="images/profile.png" alt="">
                        <div class="dropdown">
                            <div class="dropdown-content">
                                <?php
                                    if(isset($userID))
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

        <form class="mobile-search-bar" action="">
            <input type="search" placeholder="Search Items">
            <button>GO</button>
        </form>
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
    </div>
</body>
<script src="jquery/jquery-3.5.1.min.js"></script>
<script src="scripts/home.js"></script>
<script>

</script>

<script src="scripts/cookies-manage.js"></script>

</html>