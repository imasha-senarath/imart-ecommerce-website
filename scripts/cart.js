function deleteItem(cartID) {
    $(".cart-container").load('../shopping-web-site/php/cart-load.php', {
        cartID: cartID,
    });
}