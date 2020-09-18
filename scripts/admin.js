function loadfile(event) {
    var output = document.getElementById('img-preview');
    output.src = URL.createObjectURL(event.target.files[0]);
}

function clickFileBtn() {
    document.getElementById('userImage').click()
}

function editProfileDataValccidation(userID) {
    var imageFile = document.getElementById("userImage").files[0];
    var imageName = imageFile.name;
    var imageExtension = imageName.split(".").pop().toLowerCase();
    var imageSize = imageFile.size;




    var userImage = document.getElementById("img-preview").src;
    var userName = document.getElementById("userName").value;
    var userEmail = document.getElementById("userEmail").value;
    var userAddress = document.getElementById("userAddress").value;

    var nameError = document.getElementById("nameError");
    var emailError = document.getElementById("emailError");

    if (jQuery.inArray(imageExtension, ['png', 'jpg', 'jpeg']) == -1) {
        alert("Invalid Image")
    }

    if (imageSize > 2000000) {
        alert("size large");
    }

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

    if (userName.length != 0 && userEmail.length != 0) {
        nameError.style.visibility = "hidden";
        emailError.style.visibility = "hidden";

        var form_data = new FormData();
        form_data.append('userName', 'userNfame');


        $.ajax({
            url: "../shopping-web-site/php/save-profile.php",
            data: form_data,
            processData: false,
            contentType: false,
            type: "POST",
            success: function (data) {
                $('#saveProfileLoader').html(data)
            }
        });

        //window.open("../shopping-web-site/edit-profile.php?validate", "_self");
    }
}

function saveProfileDataWithoutImage(userID, userName, userEmail, userAddress) {
    $("#saveProfileLoader").load('../shopping-web-site/php/save-profile.php', {
        userID: userID,
        userName: userName,
        userEmail: userEmail,
        userAddress: userAddress
    });
}

function saveProfileDataWithImage(userID, userName, userEmail, userAddress, userImage) {
    $("#saveProfileLoader").load('../shopping-web-site/php/save-profile.php', {
        userID: userID,
        userName: userName,
        userEmail: userEmail,
        userAddress: userAddress,
        userImage: userImage
    });
}

function editProfileDataValidation(userID) {
    var imageFile = document.getElementById("userImage").files[0];
    var imageName = imageFile.name;
    var imageExtension = imageName.split(".").pop().toLowerCase();
    var imageSize = imageFile.size;




    var userImage = document.getElementById("img-preview").src;
    var userName = document.getElementById("userName").value;
    var userEmail = document.getElementById("userEmail").value;
    var userAddress = document.getElementById("userAddress").value;

    var nameError = document.getElementById("nameError");
    var emailError = document.getElementById("emailError");

    if (jQuery.inArray(imageExtension, ['png', 'jpg', 'jpeg']) == -1) {
        alert("Invalid Image")
    }

    if (imageSize > 2000000) {
        alert("size large");
    }

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

    if (userName.length != 0 && userEmail.length != 0) {
        nameError.style.visibility = "hidden";
        emailError.style.visibility = "hidden";



        var d = new Date();
        d.setTime(d.getTime() + (2 * 60 * 1000));
        var expires = "expires=" + d.toUTCString();
        document.cookie = 'validate = true' + ";" + expires + ";path=../shopping-web-site";


        window.open("../shopping-web-site/edit-profile.php", "_self");

    }
}