//ConstructMe Suppliers model

jQuery(document).ready(function ($) {

    $('#supplier-register-button').click(function () {
        let data = {};
        data.name = $('#supplier-name').val();
        data.email = $('#supplier-email').val();
        data.contact_name = $('#supplier-contact-name').val();
        data.address = $('#supplier-address').val();
        data.phone = $('#supplier-phone').val();
        if (data.name != '' && data.email != '' && data.contact_name != '' && data.address != '' && data.phone != '') {
            if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,10})+$/.test(data.email)) {
                console.log('Trying to register supplier...');
                cmeaddsupplier(data);

            } else {
                $('#supplier-error-message').html('Invalid Email format!');
            }
        } else {
            $('#supplier-error-message').html('Please fill all the required fields!');
        }
    });

    function cmeaddsupplier(data) {
        if (check_user_login()) {
            data.token = getCookie('cme-token');
//            console.log(data);
            $.post('http://localhost/construct-api/suppliers/add', data)
                    .done(function (data) {
                        if (data.success == true) {
                            $('#cme-supplier-form').hide();
                            $('#systemMessage').html('<p>New Supplier Added Successfully !</p>');
                            $('#systemMessage').show();
                        } else if (data.error) {
                            console.log(data.error);
                            $('#supplier-error-message').html(data.error);
                        }
                    });
        } else {
            alert('Your session has expired! Please login again.');
        }
    }

});
