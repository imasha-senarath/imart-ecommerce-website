function placeOrder(productID, productName) {
    var userName = document.getElementById("userName").value;
    var userAddress = document.getElementById("userAddress").value;
    var userPhone = document.getElementById("userPhone").value;

    $("#loadOrderProcess").load('../shopping-web-site/php/place-order.php', {
        productID: productID,
        productName: productName,
        userName: userName,
        userAddress: userAddress,
        userPhone: userPhone
    });
}