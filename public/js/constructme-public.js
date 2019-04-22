jQuery(document).ready(function ($) {
    console.log('RADEL - ConstructMe');
    check_login();

//On Click of Enter button Login
    var input = document.getElementById("user-password");
    if (input) {
        input.addEventListener("keyup", function (event) {
            // Number 13 is the "Enter" key on the keyboard
            if (event.keyCode === 13) {
                // Cancel the default action, if needed
                event.preventDefault();
                // Trigger the button element with a click
                document.getElementById("user-login-button").click();
            }
        });
    }

    function check_login() {
        var user = getCookie('cme-token');
        if (user != '' && user != null) {
            $('#cme-login-form').hide();
            $('#cme-logout-form').show();
            return true;
        } else {
            return false;
        }

    }

    $('#user-logout-button').click(function () {
        document.cookie = "cme-token=; expires=" + new Date() + "; path=/;";
        $('#cme-login-form').show();
        $('#cme-logout-form').hide();
        $('#login-error-message').html('');
    });

    $('#user-login-button').click(function () {
        console.log('Logging in...');
        let data = {};
        data.email = $('#user-email').val();
        data.password = $('#user-password').val();
        cmelogin(data);
    });

    function cmelogin(data) {
        $.post('http://localhost/construct-api/authorize', data)
                .done(function (data) {
                    if (data.success == true) {
                        document.cookie = "cme-token=" + data.token + "; expires=" + new Date(data.expiry) + "; path=/;";
                        $('#cme-login-form').hide();
                        $('#cme-logout-form').show();
                        $('#user-password').val('')

                    } else if (data.error) {
                        console.log(data.error);
                        $('#login-error-message').html(data.error);
                    }

                });
    }

});

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