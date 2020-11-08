/* login functions */
$("#login-btn").click(function() {
    var loginEmail = $("#loginEmail").val();
    var loginPassword = $("#loginPassword").val();

    if(loginEmail =="" || loginPassword =="") {
        $(".login-error").text("Fields can't be empty.")
        $(".login-error").css("visibility", "visible");
    } else {
        $("#loginForm").submit();
    }
});


/* signup functions */
$("#signup-btn").click(function() {
    var signupName = $("#signupName").val();
    var signupEmail = $("#signupEmail").val();
    var signupPassword = $("#signupPassword").val();

    if( signupName =="" || signupEmail =="" || signupPassword =="") {
        $(".signup-error").text("Fields can't be empty.")
        $(".signup-error").css("visibility", "visible");
    } else {
        $("#signupForm").submit();
    }
});