function viewProfile() {
    var ID = getCookie('userID');
    if (ID.length == 0) {
        window.open("login.php", "_self");
    } else {
        window.open("profile.php", "_self");
    }
}

function cart() {
    var userID = getCookie('userID');
    if (userID.length == 0) {
        window.open("login.php", "_self");
    }
    else {
        window.open("cart.php", "_self");
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