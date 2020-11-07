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


    $randomName = date("YmdHis");

    if(strlen($productImage) >= 1) {
        move_uploaded_file($imageTemp, "../storage/products/$randomName-$productImage");
        $insert = "insert into products (product_name, product_price, product_des, product_image, upload_date) 
        values ('$productName', '$productPrice', '$productDes', '$randomName-$productImage', NOW())";
        $run = mysqli_query($con, $insert);
    }
}

//getting products data
$getProductQuery = "select * from products";
$runProductQuery = mysqli_query($con, $getProductQuery);


unset($_POST['submit']);

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Products</title>
    <link rel="stylesheet" href="../styles/admin-basic.css">
    <link rel="stylesheet" href="../styles/admin-manage-products.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="side-bar">
            <h1>iMart</h1>
            <ul>
                <li onclick="location.href='dashboard.php'">Dashboard</li>
                <li style="color:white; font-weight:600;">Manage Products</li>
                <li onclick="location.href='manage-users.php'">Manage Users</li>
                <li onclick="location.href='manage-orders.php'">Manage Orders</li>
            </ul>
        </div>
        <div class="workplace">

            <div class="add-products">
                <h1> Add Product</h1>
                <form action="manage-products.php" method="post" enctype="multipart/form-data">
                    <div class="main-container">
                        <div class="left-side">
                            <img id="img-preview">
                            <h2>Select the product image</h2>
                            <input type="file" name="productImage" onchange="loadfile(event)">

                        </div>
                        <div class="right-side">
                            <input type="text" name="productName" placeholder="Product Name">
                            <input type="text" name="productPrice" placeholder="Product Price (LKR)">
                            <textarea type="text" name="productDes" placeholder="Description" rows="10"
                                cols="50"></textarea>
                        </div>
                    </div>
                    <input type="submit" value="Add Product" name="submit">
                </form>
            </div>

            <div class="manage-products">
                <h1>Manage Products</h1>
                <div class="products-list"> 
                <?php
                    while($rowProduct = mysqli_fetch_array($runProductQuery)) {
                        $productImage = $rowProduct['product_image'];
                        $productName = $rowProduct['product_name'];
                        $productID = $rowProduct['product_id'];
                        echo"
                        <div class='product'>
                            <div class='main' onclick=location.href='../view-product.php?product_id=$productID'>
                                <img src='../storage/products/$productImage' alt=''>
                                <h2>$productName</h1>
                            </div>
                            <img class='delete' src='../images/delete.png' alt='' onClick='deleteItem($productID)' title='Delete';>
                        </div>
                        ";
                    }
                ?>
                </div>
            </div>
        </div>
    </div>
    <script src="../jquery/jquery-3.5.1.min.js"></script>
    <script src="../scripts/admin.js"></script>
</body>

</html>