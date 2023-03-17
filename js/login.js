$(document).ready(function() {
    $("#login-form").submit(function(event) {
        event.preventDefault();
        var name = $("#name").val();
        var email = $("#email").val();
        if (name.trim() == "" || email.trim() == "") {
            alert("Please enter your name and email.");
            return;
        }
        $.ajax({
            type: "POST",
            url: "php/login.php",
            data: $("#login-form").serialize(),
            success: function(response) {
                if(response='register')
                {
                    window.location.href = "profile.html"; 
                }
                else
                {
                    window.location.href = "register.html"; 
                }
                    var sessionData = {
                        name: name,
                        email: email
                    };
            }
        });
    });
});