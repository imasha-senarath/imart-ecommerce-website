<?php

    include("../include/connection.php");
    $orderID = $_POST['orderID'];
    $orderCommand = $_POST['orderCommand'];

    echo"<script>alert('Order status was changes to '+'\"$orderCommand\"')</script>";

    if(isset($orderID) && isset($orderCommand))
    {
        $changeStatusQuery = "UPDATE orders SET order_status=\"$orderCommand\" WHERE order_id= $orderID";
        $runQuery = mysqli_query($con, $changeStatusQuery);

        $getOrdersQuery = "select * from orders";
        $runOrdersQuery = mysqli_query($con, $getOrdersQuery);
        echo"<h1> Manage Orders</h1>";
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
                    <button onClick='manageOrder(\"processing\",$orderID)' >Accept</button>
                    <button onClick='manageOrder(\"shipped\",$orderID)'>Shipped</button>
                    <button onClick='manageOrder(\"rejected\",$orderID)'>Reject</button>
                </div>
            </div>
            ";
        }
    }
    else {
    echo"<script>
        window.open('../home.php', '_self')
    </script>";
    }
    ?>