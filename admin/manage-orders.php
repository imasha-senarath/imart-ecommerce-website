<!DOCTYPE html>
<?php
include("../include/connection.php");

//getting products data
$getOrdersQuery = "select * from orders";
$runOrdersQuery = mysqli_query($con, $getOrdersQuery);



?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Orders</title>
    <link rel="stylesheet" href="../styles/admin-basic.css">
    <link rel="stylesheet" href="../styles/admin-manage-orders.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="side-bar">
            <h1>iMart</h1>
            <ul>
                <li onclick="location.href='dashboard.php'">Dashboard</li>
                <li onclick="location.href='manage-products.php'">Manage Products</li>
                <li onclick="location.href='manage-users.php'">Manage Users</li>
                <li style="color:white; font-weight:600;">Manage Orders</li>
            </ul>
        </div>

        <div class="orders-container">
            <h1> Manage Orders</h1>
            <?php
                while($rowOrder = mysqli_fetch_array($runOrdersQuery)) {
                    $orderID = $rowOrder['order_id'];
                    $productID = $rowOrder['product_id'];
                    $orderDate = $rowOrder['order_date'];
                    $orderStatus = $rowOrder['order_status'];
                    $orderName = $rowOrder['order_name'];
                    $orderAddress = $rowOrder['order_address'];

                    echo"
                    <div class='order'>
                    <h2>#$orderID </h2>
                        <div class='main'>
                            <div class='order-details'>
                                <p>Product ID: <span> $productID</span></p>
                                <p>Order Date: <span>$orderDate</span></p>
                                <p>Order Status: <span>$orderStatus</span></p>
                            </div>
                            <div class='order-user'>
                                <p>Name: <span> $orderName</span></p>
                                <p>Address: <span>$orderAddress</span></p>
                            </div>
                        </div>
                        <div class='controller'>
                            <button class='controller-btns' onClick='manageOrder(\"processing\",$orderID)' >Accept</button>
                            <button class='controller-btns' onClick='manageOrder(\"shipped\",$orderID)'>Shipped</button>
                            <button class='controller-btns' onClick='manageOrder(\"rejected\",$orderID)'>Reject</button>
                        </div>
                    </div>
                    ";
                }
            ?>
           
        </div>

    </div>
    <script src="../jquery/jquery-3.5.1.min.js"></script>
    <script src="../scripts/admin.js"></script>
</body>

</html>