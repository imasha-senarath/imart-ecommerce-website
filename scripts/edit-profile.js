function loadfile(event) {
    var output = document.getElementById('img-preview');
    output.src = URL.createObjectURL(event.target.files[0]);
}

function clickFileBtn() {
    document.getElementById('userImage').click()
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
    }
}