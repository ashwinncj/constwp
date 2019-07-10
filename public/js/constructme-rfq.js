//ConstructMe Add RFQ JS function

//Global scope variables storing the suppliers of the User.
var suppliers = {};

jQuery(document).ready(function ($) {
//Call the suppliers GET function to receive the list of suppliers for the users.
    getSuppliers();

    var apiEndPoint = 'http://localhost/construct-api';
//Obtain the information from the form Front-end for the RFQ on click of Submit button on the RFQ form.
    $('#rfq-save-button').click(function () {
        console.log('Attempting to save...');
        //Compile all the form fields into one JSON object to transfer to the API calls function
        let rfq_details = {
            brief_description: $('#rfq-brief-description').val(),
            suppliers: selectedSuppliers
        };

        let data = {
            pricingModel: $('#rfq-pricing-model').val(),
            name: $('#rfq-name').val(),
            due_date: $('#rfq-due-date').val(),
            attachment: rfqAttachment,
            rfq_details: JSON.stringify(rfq_details)

        };
        //Check if all the fields are filled before continuing to the next function.
        if (data.name != '' && data.pricingModel != '' && data.due_date != '' && rfq_details.brief_description != '') {
            console.log('Trying to add new RFQ...');
            $('#reviewMessage').html(' ');
            $('#rfq-form-error-message').html(' ');
            cmeAddRFQ(data);//Transfer the data to the API Call function below to connect to the server.
        } else {
            //Error message to be displayed to the front end if any fields are missing.
            $('#rfq-form-error-message').html('Please fill all the required fields!');
            $('#reviewMessage').html('<span style="color:red;">Please fill all the required fields!</span>');
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
                            handleRfqSuccess();
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
    //THis is the function to handle the duccess after the RFQ has been saved in the database using the API.
    function handleRfqSuccess() {
        $('#cme-rfq-form').hide();
        $('#systemMessage').html('<p>Your RFQ has been created successfully !</p>');
        $('#systemMessage').show();
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
//            list = '<input checked type="checkbox" onselect="addToSelected();" value="' + id + '" style="margin-top: 5px;margin-bottom: 5px;"><span class="lists">' + value + '</span><br>';
            list = '<div onclick="removeSelected(this,' + id + ')" class="selectedLists">' + value + '</div>';
            $('#selectedSuppliersOutput').append(list);
            selectedSuppliers.push(id);
            updateSuppliers();
        }
    });
}

function removeSelected(asset, id) {

    jQuery(document).ready(function ($) {
        asset.remove();
        for (var i = 0; i < selectedSuppliers.length; i++) {
            if (selectedSuppliers[i] == id) {
                selectedSuppliers.splice(i, 1);
                updateSuppliers();
            }
        }
    });
}

function updateSuppliers() {

    jQuery(document).ready(function ($) {
        let reviewSuppliers = '';
        for (var i = 0; i < selectedSuppliers.length; i++) {
            $.each(suppliers, function (key, value) {
                if (selectedSuppliers[i] == value.id) {
                    reviewSuppliers += '<div class="reviewSuppliers">' + value.name + '</div>';
                }
            });
        }
        $('#rfq-review-suppliers').html(reviewSuppliers);
    });
}

var rfqAttachment = 'No File Attached.';
//Jquery function to upload the image via AJAX
jQuery(document).ready(function ($) {

    $("#rfqUploadFile").click(function () {
        var fd = new FormData();
        var files = $('#rfq-attachment')[0].files[0];
        fd.append('userfile', files);
        fd.append('token', getCookie('cme-token'));

        $.ajax({
            url: 'http://localhost/construct-api/upload/file',
            type: 'post',
            data: fd,
            contentType: false,
            processData: false,
            success: function (response) {
                console.log(response);
                $('#rfq-attachment').val('');
                fileUpdate(response);
            },
        });
    });
});

//Function to handle the attachment file details for RFQ
function fileUpdate(response) {

    jQuery(document).ready(function ($) {
        let data;
        if (response.success == true) {
            rfqAttachment = response.file;
            data = '<div>Attached file - ' + rfqAttachment + '</div>';
        } else {
            rfqAttachment = 'No File Attached.';
            data = '<div style="color:red;">Attachment Failed - ' + response.message.error + '</div>';
        }
        $('#attachmentOutput').html(data);
        $('#rfq-review-attachment').html(rfqAttachment);
    });
}