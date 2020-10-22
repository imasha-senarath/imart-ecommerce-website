function placeOrder(productID, productName) {
    $("#loadOrderProcess").load('../shopping-web-site/php/place-order.php', {
        productID: productID,
        productName: productName
    });
}