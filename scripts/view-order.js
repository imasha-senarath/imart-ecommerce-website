
orderStatusSettings();

function orderStatusSettings() {
    var stageOne = document.getElementById("line1");
    var stageTwo = document.getElementById("line2");
    var stageThree = document.getElementById("line3");

    var pending = document.getElementById("pending");
    var processing = document.getElementById("processing");
    var shipped = document.getElementById("shipped");
    var delivered = document.getElementById("delivered");

    var pendingTxt = document.getElementById("pending2");
    var processingTxt = document.getElementById("processing2");
    var shippedTxt = document.getElementById("shipped2");
    var deliveredTxt = document.getElementById("delivered2");

    if (orderStatus == 'pending') {
        pending.style.backgroundColor = '#39c43e';
        pendingTxt.style.fontWeight = 700;
    }

    if (orderStatus == 'rejected') {
        $("#order-cancel-btn").css("opacity", "0.5");
        $(".order-status").css("opacity", "0.5");
    }

    if (orderStatus == 'cancelled') {
        $("#order-cancel-btn").css("opacity", "0.5");
        $(".order-status").css("opacity", "0.5");
    }

    if (orderStatus == 'processing') {
        pending.style.backgroundColor = '#39c43e';
        processing.style.backgroundColor = '#39c43e';
        stageOne.style.backgroundColor = '#39c43e';
        processingTxt.style.fontWeight = 700;
        $("#order-cancel-btn").css("opacity", "0.5");
    }

    if (orderStatus == 'shipped') {
        pending.style.backgroundColor = '#39c43e';
        processing.style.backgroundColor = '#39c43e';
        shipped.style.backgroundColor = '#39c43e';
        stageOne.style.backgroundColor = '#39c43e';
        stageTwo.style.backgroundColor = '#39c43e';
        shippedTxt.style.fontWeight = 700;
        $("#order-cancel-btn").css("opacity", "0.5");
    }

    if (orderStatus == 'delivered') {
        pending.style.backgroundColor = '#39c43e';
        processing.style.backgroundColor = '#39c43e';
        shipped.style.backgroundColor = '#39c43e';
        delivered.style.backgroundColor = '#39c43e';
        stageOne.style.backgroundColor = '#39c43e';
        stageTwo.style.backgroundColor = '#39c43e';
        stageThree.style.backgroundColor = '#39c43e';
        deliveredTxt.style.fontWeight = 700;
        $("#order-cancel-btn").css("opacity", "0.5");
    }
}


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