<!DOCTYPE html>
<?php
include("../include/connection.php");

if(isset($_POST['submit']))
{ 
    $productImage = $_FILES['productImage']['name'];
    $imageTemp = $_FILES['productImage']['tmp_name'];
    $productName = htmlentities(mysqli_real_escape_string($con, $_POST['productName']));
    $productPrice = htmlentities(mysqli_real_escape_string($con, $_POST['productPrice']));
    $productDes = htmlentities(mysqli_real_escape_string($con, $_POST['productDes']));

    echo"<script>alert($productImage)</script>">

    $randomName = date("YmdHis");

    if(strlen($productImage) >= 1) {
        move_uploaded_file($imageTemp, "../storage/products/$randomName-$productImage");
        $insert = "insert into products (product_name, product_price, product_des, product_image, upload_date) 
        values ('$productName', '$productPrice', '$productDes', '$randomName-$productImage', NOW())";
        $run = mysqli_query($con, $insert);
    }
}

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Add Items</title>
    <link rel="stylesheet" href="add-product.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <div class="header">
            <div class="header-container">
                <div class="left-side">
                    <h1><a href="dashboard.php">iMart - Admin</a></h1>
                </div>
                <div class="right-side">
                    <a href="signup.php">Logout</a>
                </div>
            </div>
        </div>
        <div class="main-menu">
            <a href="#">Home</a>
            <a href="#">Add Products</a>
            <a href="#">Manage Users</a>
            <a href="#">Settings</a>
        </div>
        <div class="workplace">
            <div class="add-products">
                <h1> Add Product</h1>
                <form action="add-product.php" method="post" enctype="multipart/form-data">
                    <input type="text" name="productName" placeholder="Name">
                    <input type="text" name="productPrice" placeholder="Price (LKR)">
                    <textarea type="text" name="productDes" placeholder="Description" rows="10" cols="50"></textarea>
                    Select Item Image:
                    <input type="file" name="productImage" onchange="loadfile(event)">
                    <img id="img-preview" width="200px" style="min-height: 120px;">
                    <input type="submit" value="Add Product" name="submit">
                </form>
            </div>
        </div>
    </div>
    <script src="../scripts/admin.js"></script>
</body>

</html>