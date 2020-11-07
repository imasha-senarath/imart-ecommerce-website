/* Products Manage functions  */
function deleteItem(productID) {
    $(".products-list").load('../php/admin-delete-product.php', {
        productID: productID,
    });
}

function loadfile(event) {
    var output = document.getElementById('img-preview');
    output.src = URL.createObjectURL(event.target.files[0]);
}


/* Users Manage functions  */
function deleteUser(userID) {
    $(".users-container").load('../php/admin-delete-user.php', {
        userID: '\"'+userID+'\"',
    });
}


/* orders Manage functions  */
function manageOrder(orderCommand, orderID) {
    $(".orders-container").load('../php/admin-order-process.php', {
        orderID: orderID,
        orderCommand: orderCommand,
    });
}