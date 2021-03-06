jQuery(document).ready(function ($) {
    var apiEndPoint = 'http://localhost/construct-api';
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

    $('#register-confirm-password').change(function (e) {
        $('#user-register-button').focus();
    });

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
        let data = {};
        data.email = $('#user-email').val();
        data.password = $('#user-password').val();
        if (data.email != '' && data.password != '') {
            if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(data.email)) {
                console.log('Logging in...');
                cmelogin(data);
            } else {
                $('#login-error-message').html('Invalid Email format!');
            }
        } else {
            $('#login-error-message').html('Please fill all the required fields!');
        }
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

    $('#user-register-button').click(function () {
        let data = {};
        data.email = $('#register-user-email').val();
        data.password = $('#register-user-password').val();
        data.confirmpassword = $('#register-confirm-password').val();
        if (data.email != '' && data.password != '' && data.confirmpassword != '') {
            if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,10})+$/.test(data.email)) {
                if (data.password == data.confirmpassword) {
                    console.log('Trying to register user...');
                    cmeregister(data);
                } else {
                    $('#register-error-message').html('Passwords entered don\'t match!');
                }
            } else {
                $('#register-error-message').html('Invalid Email format!');
            }
        } else {
            $('#register-error-message').html('Please fill all the required fields!');
        }
    });

    function cmeregister(data) {
        $.post('http://localhost/construct-api/authorize/register', data)
                .done(function (data) {
                    if (data.success == true) {
                        $('#cme-register-form').html('User successfully registered! Please continue to login...');
                    } else if (data.error) {
                        console.log(data.error);
                        $('#register-error-message').html(data.error);
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

function check_user_login() {
    var user = getCookie('cme-token');
    if (user != '' && user != null) {
        return true;
    } else {
        return false;
    }
}

function popup_message() {
}
function emailTester(inputEmail) {
    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,10})+$/.test(inputEmail)) {
        return true;
    } else {
        return false;
    }
}
;


