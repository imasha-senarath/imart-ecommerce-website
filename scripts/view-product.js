function addToCart(productID, productName) {
    $("#cartSucess").load('../shopping-web-site/php/add-to-cart.php', {
        productID: productID,
        productName: productName
    });
}

function placeOrder(productID, productName) {
    $("#cartSucess").load('../shopping-web-site/php/place-order.php', {
        productID: productID,
        productName: productName
    });
}