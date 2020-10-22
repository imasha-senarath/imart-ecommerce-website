<!DOCTYPE html>

<?php
include("include/connection.php");

$productID = $_GET["product_id"];
if(!isset($productID))
{
    echo"<script>window.open('home.php', '_self')</script>";
}

//getting product data
$getProductDataQuery = "select * from products where product_id='$productID'";
$runGetProductDataQuery = mysqli_query($con, $getProductDataQuery);
$rowProductData = mysqli_fetch_array($runGetProductDataQuery);
$productName = $rowProductData['product_name'];
$productImage = $rowProductData['product_image'];
$productPrice = $rowProductData['product_price'];
$productDes = $rowProductData['product_des'];

$userID = $_COOKIE['userID'];
if(isset($userID))
{
    $getUser = "select * from users where user_id='$userID'";
    $runUser = mysqli_query($con, $getUser);
    $rowUser = mysqli_fetch_array($runUser);
    $userName = $rowUser['user_name'];
    $userAddress = $rowUser['user_address'];
    $userPhone = $rowUser['user_phone'];
    $userImage = $rowUser['user_image'];
}

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iMart</title>
    <link rel="stylesheet" href="styles/checkout.css">
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

        <div class="order-container">
            <h1 id='title1'>Order Details</h1>
            <?php echo "                  
                <div class='product-container' onclick=location.href='view-product.php?product_id=$productID'>
                    <img src='storage/products/$productImage'>
                    <p id='name'> $productName </p>
                    <p id='price'> Price: <span id='priceValue'>Rs $productPrice</span> </p>
                </div>
            "?>
            <div class='shipping-fee'>
                <p>Shipping Fee</p>
                <p id='value'>Rs 0</p>
                <p>Payment Method</p>
                <p id='value'>Cash on Delivery</p>
            </div>
            <div class='section-three'>
                <p id='title2'>Payment Method: Cash on Delivery</p>
                <div class='payment-method'>
                    <img src='images/cash-on-delivery.png'>
                    <img src='images/credit-card.png'>
                    <img src='images/paypal.png'>
                    <p> Cash on Delivery</p>
                    <p> Debit/Credit Card</p>
                    <p> PayPal</p>
                </div>
            </div>
        </div>

        <div class='additional'>
            <div class='shipping-address'>
                <h1> Shipping Address<spin>
                </h1>
                <?php echo "
                    <form class='shipping-address' method='post'>
                        <input type='text' id='userName' name='userName' value='$userName' placeholder='Receiver name'>
                        <input type='text' id='userAddress' name='userAddress' value='$userAddress' placeholder='Receiver address'>
                        <input type='text' id='userPhone' name='userPhone' value='$userPhone' placeholder='Receiver phone number'>
                        <button type='button'> Edit </button>
                    </form>
                "?>
            </div>
            <div class='total-price'>
                <h1> Total Price</h1>
                <div class='table'>
                    <p> Product Price</p>
                    <?php echo"<p class='right'> Rs $productPrice</p>";?>
                    <p> Shipping Fee</p>
                    <p class='right'> Rs 0</p>
                    <p class='ftotal'> Total Price </p>
                    <?php echo"<p class='right ftotal'> Rs $productPrice</p>";?>
                </div>
                <?php echo"<button type='button' id='confirmBtn' onClick='placeOrder($productID ,\"$productName\")'> Confirm
                    Order</button>"?>
                <div id="loadOrderProcess"></div>
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
<script src="scripts/checkout.js"></script>
<script src="scripts/basic.js"></script>

</html>