//ConstructMe Add RFQ JS function

//Global scope variables storing the suppliers of the User.
var suppliers = {};

jQuery(document).ready(function ($) {
//Call the suppliers GET function to receive the list of suppliers for the users.
    getSuppliers();

    var apiEndPoint = 'http://localhost/construct-api';
//Obtain the information from the form Front-end for the RFQ on click of Submit button on the RFQ form.
    $('#rfq-save-button').click(function () {
        console.log('Stage1');
        //Compile all the form fields into one JSON object to transfer to the API calls function
        rfqSuppliers = 123;
        let rfq_details = {
            brief_description: $('#rfq-brief-description').html(),
            suppliers: rfqSuppliers
        };

        let data = {
            pricingModel: $('#rfq-pricing-model').val(),
            name: $('#rfq-name').val(),
            due_date: $('#rfq-due-date').val(),
            attachment: $('#rfq-attachment').val(),
            rfq_details: JSON.stringify(rfq_details)

        };
        //Check if all the fields are filled before continuing to the next function.
        if (data.name != '' && data.pricingModel != '' && data.due_date != '') {
            console.log('Trying to add new RFQ...');
            cmeAddRFQ(data);//Transfer the data to the API Call function below to connect to the server.
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
            console.log(data);
            //POST API Method to add the RFQ to the database.
            $.post('http://localhost/construct-api/rfq/add', data)
                    .done(function (data) {
                        //Perform action here once the RFQ has been successfully added to the database.
                        if (data.success == true) {
                            console.log(data);
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

    //Function to fetch all the suppliers of the User from the Database.
    function getSuppliers() {
        //Test the user login before proceeding.
        if (check_user_login()) {
            let data = {};
            data.token = getCookie('cme-token');
            //Access the suppliers' list from the database using API
            $.post('http://localhost/construct-api/suppliers/get', data)
                    .done(function (data) {
                        if (data.success == true) {
                            //Set the variable 'suppliers' with the data received from the response of the API.
                            suppliers = data.suppliers;
                        } else if (data.error) {
                            console.log(data.error);
                        }
                    });
        } else {
            alert('Your session has expired! Please login again.');
        }
    }

    $('#rfq-supplier-search').keyup(function () {
//    $('#search-suppliers-button').click(function () {
        let searchTerm = $('#rfq-supplier-search').val();
        let list = '';
        //Iterate through each suppliers in the variable and update matching to the search string.
        if (searchTerm != '') {
            $.each(suppliers, function (key, value) {
                if (value.name.toUpperCase().indexOf(searchTerm.toUpperCase()) != -1) {
                    //console.log(value);
//                    list += '<input type="checkbox" onselect="addToSelected();" value="' + value.id + '" style="margin-top: 5px;margin-bottom: 5px;"><span class="lists">' + value.name + '</span><br>';
                    list += '<div class="lists" onclick="addToSelected(' + value.id + ',' + "'" + value.name + "'" + ')">' + value.name + '</div>';
                }
            });
        }
        //Append the list obtained through the search to the page.
        $('#suppliersOutput').html(list);
    });

});

var selectedSuppliers = [];
function addToSelected(id, value) {
    jQuery(document).ready(function ($) {
        if ($.inArray(id, selectedSuppliers) == -1) {
            list = '<input checked type="checkbox" se onselect="addToSelected();" value="' + id + '" style="margin-top: 5px;margin-bottom: 5px;"><span class="lists">' + value + '</span><br>';
            $('#selectedSuppliersOutput').append(list);
            selectedSuppliers.push(id);
        }
    });
}