function addToCart(productID, productName) {
    $("#cartSucess").load('../shopping-web-site/php/add-to-cart.php', {
        productID: productID,
        productName: productName
    });
}