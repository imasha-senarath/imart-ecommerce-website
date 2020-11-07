<?php

    include("../include/connection.php");
    $productID = $_POST['productID'];

    echo"<script>alert('No '+$productID+' product was deleted.')</script>";

    if(isset($productID))
    {
        $deleteItemQuery = "delete from products where product_id =$productID";
        $runDeleteItem = mysqli_query($con, $deleteItemQuery);

        $getProductQuery = "select * from products";
        $runProductQuery = mysqli_query($con, $getProductQuery);

        while($rowProduct = mysqli_fetch_array($runProductQuery)){
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
    }
    else {
    echo"<script>
        window.open('../shopping-web-site/home.php', '_self')
    </script>";
    }
    ?>