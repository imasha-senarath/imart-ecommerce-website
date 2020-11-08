function loadfile(event) {
    var output = document.getElementById('img-preview');
    output.src = URL.createObjectURL(event.target.files[0]);
}

function editProfile() {
    window.open("../shopping-web-site/edit-profile.php", "_self");
}

function editProfileDataValidation(userID) {

    var imageError = document.getElementById("imageError");
    var nameError = document.getElementById("nameError");
    var emailError = document.getElementById("emailError");

    var imageFormatValidation = 'true';
    var imageSizeValidation = 'true';

    if (document.getElementById("userImage").files.length != 0) {
        var imageFile = document.getElementById("userImage").files[0];
        var imageName = imageFile.name;
        var imageExtension = imageName.split(".").pop().toLowerCase();
        var imageSize = imageFile.size;

        if (jQuery.inArray(imageExtension, ['png', 'jpg', 'jpeg']) == -1) {
            imageError.style.visibility = "visible";
            imageError.innerHTML = "Invalid image file.";
            var imageFormatValidation = 'false';
        }
        else {
            if (imageSize > 2000000) {
                imageError.style.visibility = "visible";
                imageError.innerHTML = "Image file size is large.";
                var imageSizeValidation = 'false';
            }
            else {
                imageError.style.visibility = "hidden";
            }
        }
    }

    var userName = document.getElementById("userName").value;
    var userEmail = document.getElementById("userEmail").value;


    if (userName.length == 0) {
        nameError.style.visibility = "visible";
    } else {
        nameError.style.visibility = "hidden";
    }

    if (userEmail.length == 0) {
        emailError.style.visibility = "visible";
    } else {
        emailError.style.visibility = "hidden";
    }

    if (userName.length != 0 && userEmail.length != 0 && imageFormatValidation == 'true' && imageSizeValidation == 'true') {
        nameError.style.visibility = "hidden";
        emailError.style.visibility = "hidden";
        imageError.style.visibility = "hidden";

        document.getElementById("editProfileForm").submit();

        // var form = $('#editProfileForm')[0];
        // var form_data = new FormData(form);

        // $.ajax({
        //     url: "../shopping-web-site/edit-profile.php",
        //     method: "POST",
        //     data: form_data,
        //     contentType: false,
        //     cache: false,
        //     processData: false,
        //     success: function (data) {
        //         $('#saveProfileLoader').html(data);
        //     }
        // })

        // var d = new Date();
        // d.setTime(d.getTime() + (2 * 60 * 1000));
        // var expires = "expires=" + d.toUTCString();
        // document.cookie = 'validate = true' + ";" + expires + ";path=../shopping-web-site";

        // window.open("../shopping-web-site/edit-profile.php?validate=true", "_self");
    }
}

function userLogout() {
    document.cookie = "userID=; expires=Thu, 01 Jan 1970 00:00:00 UTC;";
    window.open("../shopping-web-site/welcome.php", "_self");
}

function cart() {
    var userID = getCookie('userID');
    if (userID.length == 0) {
        window.open("../shopping-web-site/welcome.php", "_self");
    }
    else {
        window.open("../shopping-web-site/cart.php", "_self");
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
