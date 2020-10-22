<!DOCTYPE html>
<?php
include("../include/connection.php");

$productCountQuery = "select * from products";
$runproductCountQuery = mysqli_query($con,$productCountQuery);
$productCount = mysqli_num_rows($runproductCountQuery);

$usersCountQuery = "select * from users";
$runusersCountQuery = mysqli_query($con,$usersCountQuery);
$usersCount = mysqli_num_rows($runusersCountQuery);

$getUserQuery = "select * from users Order by id desc limit 5";
$rungetUser = mysqli_query($con, $getUserQuery);

$ordersCountQuery = "select * from orders";
$runOrdersCountQuery = mysqli_query($con,$ordersCountQuery);
$ordersCount = mysqli_num_rows($runOrdersCountQuery);

$getOrderQuery = "select * from orders Order by id desc limit 5";
$rungetOrder = mysqli_query($con, $getOrderQuery);

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../styles/admin-basic.css">
    <link rel="stylesheet" href="../styles/admin-dashboard.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="side-bar">
            <h1>iMart</h1>
            <ul>
                <li style="color:white; font-weight:600;">Dashboard</li>
                <li onclick="location.href='manage-products.php'">Manage Products</li>
                <li>Manage Users</li>
                <li>Manage Orders</li>
            </ul>
            <p>Settings</p>
        </div>
        <div class="work-place">
            <div class="summary">
                <div class="products">
                    <img src="../images/products.png" alt="">
                    <?php echo" <h1>0$productCount Products</h1> "; ?>
                    <p>All products</p>
                </div>
                <div class="users">
                    <img src="../images/products.png" alt="">
                    <?php echo" <h1>0$usersCount Users </h1> "; ?>
                    <p>Registered users</p>
                </div>
                <div class="orders">
                    <img src="../images/products.png" alt="">
                    <?php echo" <h1>0$ordersCount Orders </h1> "; ?>
                    <p>Pending orders</p>
                </div>
                <div class="admins">
                    <img src="../images/products.png" alt="">
                    <h1>01 Admins</h1>
                    <p>Admin panel</p>
                </div>
            </div>

            <div class="summary-two">
                <div class="users-two">
                    <h1> Latest Users </h1>
                    <div class="list">
                        <?php
                        while($rowUsers = mysqli_fetch_array($rungetUser))
                        {
                            $userName = $rowUsers['user_name'];
                            $userID = $rowUsers['user_id'];

                            echo"
                            <p> $userName</p>
                            <p class='right'> #$userID</p>
                            ";
                        }
                        ?>
                    </div>
                </div>
                <div class="orders-two">
                    <h1> Pending Orders </h1>
                    <div class="list">
                        <?php
                        while($rowOrders = mysqli_fetch_array($rungetOrder))
                        {
                            $orderID = $rowOrders['order_id'];
                            $orderDate = $rowOrders['order_date'];

                            echo"
                            <p>  $orderDate </p>
                            <p class='right'>  #$orderID </p>
                            ";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="scripts/admin.js"></script>
</body>

</html>