<!DOCTYPE html>

<?php
include("include/connection.php");

$orderID = $_GET["order_id"];
$userID = $_COOKIE['userID'];

if(!isset($orderID) || !isset($userID))
{
    echo"<script>window.open('home.php', '_self')</script>";
}

if(isset($userID))
{
    $getUser = "select * from users where user_id='$userID'";
    $runUser = mysqli_query($con, $getUser);
    $row = mysqli_fetch_array($runUser);
    $userName = $row['user_name'];
    $userImage = $row['user_image'];
}

//geting order data
$getOrderDataQuery = "select * from orders where order_id='$orderID'";
$runGetOrderDataQuery = mysqli_query($con, $getOrderDataQuery);
$rowOrderData = mysqli_fetch_array($runGetOrderDataQuery);
$orderDate = $rowOrderData['order_date'];
$productID = $rowOrderData['product_id'];
$OrderStatus = $rowOrderData['order_status'];
$OrderAddress = $rowOrderData['order_address'];
echo"<script> var orderStatus = '$OrderStatus';</script>";

//getting product data
$getProductDataQuery = "select * from products where product_id='$productID'";
$runGetProductDataQuery = mysqli_query($con, $getProductDataQuery);
$rowProductData = mysqli_fetch_array($runGetProductDataQuery);
$productName = $rowProductData['product_name'];
$productImage = $rowProductData['product_image'];
$productPrice = $rowProductData['product_price'];
$productDes = $rowProductData['product_des'];



?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iMart</title>
    <link rel="stylesheet" href="styles/view-order.css">
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

        <div class="order-container">
            <h1 id='title1'>Order Details</h1>
            <div class='section-one'>
                <div>
                    <?php echo"<p> Order #$orderID</p>";?>
                    <?php echo"<p id='date'> Placed on $orderDate</p>";?>
                </div>
                <button type='button'> Add a Feedback</button>
            </div>
            <?php echo "                  
                <div class='section-two' onclick=location.href='view-product.php?product_id=$productID'>
                    <img src='storage/products/$productImage'>
                    <p id='name'> $productName <br> <spin id='btn'> See more details about this product </spin></p>
                    <p id='price'> Total Price: <span class='highlight'>Rs $productPrice</span> <br> Pay by Cash on delivery </p>
                </div>
            "?>

            <div class='section-three'>
                <p id='title2'>Order Status:</p>
                <div class='order-status'>
                    <div id='line'>
                        <div id='line1'></div>
                        <div id='line2'></div>
                        <div id='line3'></div>
                    </div>
                    <div id='pending'></div>
                    <div id='processing'></div>
                    <div id='shipped'></div>
                    <div id='delivered'></div>
                </div>
                <div class='order-status'>
                    <p id='pending2'>Pending</p>
                    <p id='processing2'>Processing</p>
                    <p id='shipped2'>Shipped</p>
                    <p id='delivered2'>Delivered</p>
                </div>
                <p id='deliveryDate'>Estimated Delivery Date: Pending</p>
            </div>

            <div class='section-four'>
                <button type='button'> Cancel Order</button>
                <button type='button'> Contact iMart</button>
            </div>
        </div>

        <div class='additional'>
            <div class='address'>
                <h1> Shipping Address</h1>
                <p> Imasha Senarath</p>
                <?php echo"<p> $OrderAddress </p>";?>
                <p> 0774534735</p>

            </div>
            <div class='total'>
                <h1> Total Price</h1>
                <div class='table'>
                    <p> Sub Total</p>
                    <?php echo"<p class='right'> Rs $productPrice</p>";?>
                    <p> Shipping Fee</p>
                    <p class='right'> Rs 0</p>
                    <p class='ftotal'> Total Price </p>
                    <?php echo"<p class='right ftotal'> Rs $productPrice</p>";?>

                </div>
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
<script src="scripts/view-order.js"></script>
<script src="scripts/basic.js"></script>

</html>