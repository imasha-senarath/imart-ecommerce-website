<!DOCTYPE html>
<?php
include("../include/connection.php");

$productCountQuery = "select * from products";
$runproductCountQuery = mysqli_query($con,$productCountQuery);
$productCount = mysqli_num_rows($runproductCountQuery);

$usersCountQuery = "select * from users";
$runusersCountQuery = mysqli_query($con,$usersCountQuery);
$usersCount = mysqli_num_rows($runusersCountQuery);

$ordersCountQuery = "select * from orders";
$runOrdersCountQuery = mysqli_query($con,$ordersCountQuery);
$ordersCount = mysqli_num_rows($runOrdersCountQuery);

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Add Items</title>
    <link rel="stylesheet" href="dashboard.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <div class="header">
            <div class="header-container">
                <div class="left-side">
                    <h1><a href="admin.php">iMart - ADMIN</a></h1>
                </div>
                <div class="right-side">
                    <a href="signup.php">Setting</a>
                    <a href="signup.php">Logout</a>
                </div>
            </div>
        </div>
        <div class="dashboard">
            <div class="products">
                <h1>Products</h1>
                <?php echo"<h2>0$productCount</h2>"?>
                <button class="add" onclick=location.href='add-product.php'>Add</button>
                <button class="manage">Manage</button>
            </div>

            <div class="products">
                <h1>Users</h1>
                <?php echo"<h2>0$usersCount</h2>"?>
                <button class="manage">Manage</button>
            </div>

            <div class="products">
                <h1>Orders</h1>
                <?php echo"<h2>0$ordersCount</h2>"?>
                <button class="manage">Manage</button>
            </div>
        </div>
    </div>
    <script src="scripts/admin.js"></script>
</body>

</html>