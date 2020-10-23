var index = 0;
show();

function show() {
    var i;
    var slides = document.getElementsByClassName("slide");
    var dots = document.getElementsByTagName("span");
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none"
    }

    index = index + 1;
    if (index > slides.length) {
        index = 1;
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace("active", "");
    }
    slides[index - 1].style.display = "block";
    dots[index - 1].className += "active";
    setTimeout(show, 1500);
}

function logout() {
    document.cookie = "userID=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/shopping-web-site;";
    window.open("home.php", "_self");
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

function search() {
    var searchKeyword = document.getElementById("searchInput").value;

    if (searchKeyword != "") {
        var url = "../shopping-web-site/product-list.php?search_keyword=" + searchKeyword;
        window.open(url, "_self");
    }
}