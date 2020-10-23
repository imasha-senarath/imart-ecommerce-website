<!DOCTYPE html>

<?php
include("include/connection.php");

$userID = $_COOKIE['userID'];
$searchKeyword = $_GET["search_keyword"];

if(isset($userID))
{
    $getUser = "select * from users where user_id='$userID'";
    $runUser = mysqli_query($con, $getUser);
    $row = mysqli_fetch_array($runUser);
    $userName = $row['user_name'];
    $userImage = $row['user_image'];
}

//get products data
if(isset($searchKeyword))
{
    $getProductQuery = "select * from products where product_name like '%".$searchKeyword."%'";
    $runProductQuery = mysqli_query($con, $getProductQuery);
    $numberOfProducts = mysqli_num_rows($runProductQuery);
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iMart | Home</title>
    <link rel="stylesheet" href="styles/product-list.css">
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
                            if(empty($userImage)){
                                echo"<img id='dp' src='images/user.png' alt='' onclick='viewProfile()'>";
                            } else{
                                echo"<img id='dp' src='storage/users/$userImage' alt=''style='border-radius: 50px;' onclick='viewProfile()'/>";
                            }
                        }
                        else {
                            echo"<img id='dp' src='images/user.png' alt='' onclick='viewProfile()'>";
                        }
                        ?>
                </div>
            </div>
        </div>

        <div class="main-container">
            <div class="serach-bar">
                <?php echo"<input id='searchInput' type='text' value='$searchKeyword' placeholder='Search for Products'>";?>
                <button onclick='search()'>GO</button>
            </div>
            <div class="product-list">
                <?php
                if($numberOfProducts != 0)
                {
                    while($productRow = mysqli_fetch_array($runProductQuery)){
                        $productImage = $productRow['product_image'];
                        $productName = $productRow['product_name'];
                        $productPrice = $productRow['product_price'];
                        $productID = $productRow['product_id'];

                        echo"
                        <div class='product' onclick=location.href='view-product.php?product_id=$productID'>
                            <img src='storage/products/$productImage' alt=''>
                            <h1>$productName</h1>
                            <h2>Rs $productPrice</h2>
                        </div>
                        ";
                    }
                } else {
                    echo"<h3>None of the products matched this search</h3>";
                }
                
                ?>
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
<script src="scripts/home.js"></script>

</html>