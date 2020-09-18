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
else
{
    echo"<script>window.open('home.php', '_self')</script>";
}

//geting cart data
$getCartQuery = "select * from carts where user_id='$userID'";
$rungetCartQuery = mysqli_query($con, $getCartQuery);

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iMart</title>
    <link rel="stylesheet" href="styles/cart.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <div class="header">
            <div class="header-container">
                <div class="left-side">
                    <h1><a href="home.php">iMart - Cart</a></h1>
                </div>
                <div class="right-side">
                    <div class="main-menu">
                        <ul>
                            <li><a>Messages</a></li>
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

        <div class="cart-container">
            <div class="product-container">
                <?php
                    while($rowCart = mysqli_fetch_array($rungetCartQuery)){
                        $productID = $rowCart['product_id'];

                        $getProductQuery = "select * from products where product_id='$productID'";
                        $runProductQuery = mysqli_query($con, $getProductQuery);
                        $rowProduct = mysqli_fetch_array($runProductQuery);
                        $productName = $rowProduct['product_name'];
                        $productImage = $rowProduct['product_image'];
                        $productDes = $rowProduct['product_des'];
                        $productPrice = $rowProduct['product_price'];                       


                        echo"
                            <div class='product'>
                                <img src='storage/products/$productImage' alt=''>
                                <h1>$productName</h1>
                                <h2>Rs $productPrice</h2>
                                <img class='delete' src='images/delete.png' alt=''>
                            </div>
                        ";
                    }
                ?>
            </div>
        </div>

    </div>
</body>

<script src="scripts/home.js"></script>
<script>
src = "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
</script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="scripts/cookies-manage.js"></script>

</html>