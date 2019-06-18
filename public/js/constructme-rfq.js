//ConstructMe Add RFQ JS function

jQuery(document).ready(function ($) {
    var apiEndPoint = 'http://localhost/construct-api';
//Obtain the information from the form Front-end for the RFQ on click of Submit button on the RFQ form.
    $('#add-rfq-button').click(function () {
        //Compile all the form fields into one JSON object to transfer to the API calls function
        let data = {
            pricingModel = $('#rfq-pricing-model').val(),
            name = $('#rfq-name').val(),
            
        };
        //Check if all the fields are filled before continuing to the next function.
        if (data.name != '' && data.email != '') {
            if (emailTester(data.email)) {//Proceed only if valid email
                console.log('Trying to add new RFQ...');
                cmeAddRFQ(data);//Transfer the data to the API Call function below to connect to the server.
            } else {
                //Error message for invalid email
                $('#rfq-form-error-message').html('Invalid Email format!');
            }
        } else {
            //Error message to be displayed to the front end if any fields are missing.
            $('#rfq-form-error-message').html('Please fill all the required fields!');
        }
    });

//Main function to add RFQ to the database using the API calls provided.    
    function cmeAddRFQ(data) {
        //Check the user login information before proceeding and provide error message if the session has expired.
        if (check_user_login()) {
            data.token = getCookie('cme-token');

            //POST API Method to add the RFQ to the database.
            $.post(apiEndPoint + '/suppliers/add', data)
                    .done(function (data) {
                        //Perform action here once the RFQ has been successfully added to the database.
                        if (data.success == true) {
                        } else if (data.error) {
                            //Provide error message sent by the server to the console for debugging.
                            console.log(data.error);
                        }
                    });
        } else {
            //Alert the user regarding the expired session to continue adding the RFQ.
            alert('Your session has expired! Please login again.');
        }
    }

    console.log(apiEndPoint);
});
