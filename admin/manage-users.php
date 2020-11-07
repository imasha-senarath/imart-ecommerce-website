<!DOCTYPE html>
<?php
include("../include/connection.php");

//getting users data
$getUsersQuery = "select * from users";
$runUsersQuery = mysqli_query($con, $getUsersQuery);


unset($_POST['submit']);

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users </title>
    <link rel="stylesheet" href="../styles/admin-basic.css">
    <link rel="stylesheet" href="../styles/admin-manage-users.css">
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
                <li style="color:white; font-weight:600;">Manage Users</li>
                <li onclick="location.href='manage-orders.php'">Manage Orders</li>
            </ul>
        </div>

        <div class="users-container">
            <h1> Manage Users</h1>
            <?php
                while($rowUsers = mysqli_fetch_array($runUsersQuery))
                {
                    $userName = $rowUsers['user_name'];
                    $userID = $rowUsers['user_id'];
                    $userEmail = $rowUsers['user_email'];
                    $userImage = $rowUsers['user_image'];
                    echo"
                    <div class='user'>
                        <div class='main' onclick=location.href='../view-product.php?product_id=$productID'>
                            <img src='../storage/users/$userImage' alt=''>    
                            <h2>#$userID</h2>
                            <p> $userName </p>
                            <p> $userEmail </p>
                        </div>
                    <img class='delete' src='../images/delete.png' alt='' onClick='deleteUser(\"$userID\")' title='Delete'>
                    </div>";
                }
            ?>
        </div>

    </div>
    <script src="../jquery/jquery-3.5.1.min.js"></script>
    <script src="../scripts/admin.js"></script>
</body>

</html>