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

function viewProfile() {
    var ID = getCookie('userID');
    if (ID.length == 0) {
        window.open("login.php", "_self");
    } else {
        window.open("profile.php", "_self");
    }
}

function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}