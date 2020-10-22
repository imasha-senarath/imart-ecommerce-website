<?php

    include("../include/connection.php");
    $userID = $_COOKIE['userID'];
    $cartID = $_POST['cartID'];

    if(isset($userID) && isset($cartID))
    {
        $deleteItemQuery = "delete from carts where cart_id =$cartID";
        $runDeleteItem = mysqli_query($con, $deleteItemQuery);

        $getCartQuery = "select * from carts where user_id='$userID'";
        $rungetCartQuery = mysqli_query($con, $getCartQuery);
        $cartItemsCount = mysqli_num_rows($rungetCartQuery);
        
        if($cartItemsCount > 0) {
        echo"
        <div class='product-container'>
            <h1 id='title'> Cart</h1>";
            $totalPrice;

            while($rowCart = mysqli_fetch_array($rungetCartQuery))
            {
                $productID = $rowCart['product_id'];
                $cartID = $rowCart['cart_id'];

                $getProductQuery = "select * from products where product_id='$productID'";
                $runProductQuery = mysqli_query($con, $getProductQuery);
                $rowProduct = mysqli_fetch_array($runProductQuery);
                $productName = $rowProduct['product_name'];
                $productImage = $rowProduct['product_image'];
                $productDes = $rowProduct['product_des'];
                $productPrice = $rowProduct['product_price'];

                $totalPrice = (double)$productPrice + $totalPrice;

                echo"
                <div class='product'>
                    <div class='main' onclick=location.href='checkout.php?product_id=$productID'>
                        <img src='storage/products/$productImage' alt=''>
                        <h1>$productName</h1>
                        <h2>Rs $productPrice</h2>
                    </div>
                    <img class='delete' src='images/delete.png' alt='' onClick='deleteItem($cartID)'>
                </div>";
            }
        echo"
        </div>
    
        <div class='cart-summary'>
            <h1>Summary</h1>
            <div>
                <p class='left'>Sub Total</p>
                <p>Rs. $totalPrice </p>
                <p class='left'>Shipping Fee</p>
                <p>0</p>
                <p class='left total'>Total</p>
                <p class='total'>Rs. $totalPrice </p>
            </div>
        </div> "; 
    } else {
        echo"
            <p id='noItemsInCartLabel'> No Items in the Cart.</p>
        ";
    }
}
else {
echo"<script>
window.open('../shopping-web-site/home.php', '_self')
</script>";
}
?>