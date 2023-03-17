$(document).ready(function() {
    $('#register-form').submit(function(e) {

        e.preventDefault();
        $.ajax({
            url: './php/register.php',
            type: 'POST',
            data: $('#register-form').serialize(),
            success: function(response) {
                console.log(response);
                if(response=='User registered successfully.')
                {
                alert('Registration successful!');
                window.location.href = 'login.html';
                }
            }
        });
    });
});