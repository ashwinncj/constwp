
<!--Add RFQ Template Page-->
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<style>
    /* HIDE RADIO */
    .image-radio{
        position: absolute;
        opacity: 0;
        width: 0;
        height: 0;
    }

    /* IMAGE STYLES */
    .image-radio + img {
        cursor: pointer;
    }

    /* CHECKED STYLES */
    .image-radio:checked + img {
        outline: 2px solid #f00;
    }
    /* BOX STYLES */
    .box{
        border: 2px solid #FFA337;
        box-shadow: 0px 4px 4px -1px grey;
        margin: auto;
        width: 710px;
        height: auto;
        position: relative;
        margin-top: 50px;
        padding: 25px;
    }
    /*Box headings styles*/
    .headings{
        font-size: 16px;
        font-weight: 900;
        font-family: "Raleway";
    }
    input[type="text"], input[type="date"], textarea{
        border: none;
        color: #000000;
        border-bottom: 1px solid black;
        border-radius: 0px;
        width: 100%;
        margin-bottom: 20px;
        margin-top: 10px;
        padding: 5px;
        background-color: #FFFFFF;
    }
    /* FIELD INPUT STYLES*/
    .fieldinput{
        color: #000000;
        border: none;
        border-bottom: 1px solid black;
        width: 100%;
        margin-bottom: 20px;
        margin-top: 10px;
        padding: 5px;
    }
    /* FIELD NAME STYLES*/
    .fieldname{
        font-weight: 700;
        font-size: 14px;
    }
    /* ASTERISK STYLES*/
    .reqasterisk{
        color: red;
    }
    /* PLACEHOLDER STYLES*/
    .fieldinput::placeholder{
        font-size: 12px;
        font-family: "Raleway";
    }
    .cme-orange-btn{
        background-color: #FFA337;
        width: auto;
        padding: 5px;
        text-transform: uppercase;
        border: none;
        border-radius: 5px;
        font-family: "Raleway";
        font-weight: bold;
        color: white;
        font-size: 14px;
        box-shadow: 0px 0px 2px 0px grey;
        cursor: pointer;
    }
    .cme-orange-btn:hover{
        box-shadow: 0px 0px 5px 0px black;
    }
    .cme-orange-selected{
        background-color: #FFA337;
        border: none;
        border-radius: 3px;
        font-family: "Raleway";
        font-weight: 600;
        color: white;
        font-size: 12px;
    }
    /*Save-send button in Review and send box styles*/
    .cme-orange-save-send{
        background-color: #FFA337;
        border: none;
        border-radius: 3px;
        font-family: "Raleway";
        font-weight: 600;
        color: white;
        font-size: 12px;
        align-content: center;
        box-shadow: 0px 0px 2px 0px grey;
        cursor: pointer;
    }
    /*    Supplier lists display styles*/
    .lists{
        font-size: 14px;
        font-weight: bold;
        background-color: antiquewhite;
        margin: 5px;
        padding: 5px;
        padding-left: 15px;
    }

    .lists:hover{
        background-color: #8cce3f;
        cursor: pointer;
    }
    .lists:active{
        background-color: #6f7f5b;
    }
    .selectedLists::after{
        content: '\2717';
        font-weight: bold;
        display: inline-block;
        width: 1em;
        text-align: right;
        color: red;
    }
    .selectedLists{
        font-size: 14px;
        font-weight: bold;
        background-color: antiquewhite;
        margin: 5px;
        padding: 5px;
        padding-left: 15px;
    }

    .selectedLists:hover{
        background-color: #ff5a4e;
        cursor: pointer;
    }
    .selectedLists:active{
        background-color: #ad8582;
    }
    /*Review and Send box styles*/
    .reviewdetails{
        font-size: 14px;
        font-weight: 500;
        font-family: "Raleway";
        color: #000000;
        margin-top: 2px;
    }
    .totalprice{
        font-size: 17px;
        border: 2px solid #ffa337;
        width: auto;
        border-radius: 25px;
        text-align: center;
        background: none;
        font-weight: bolder;
        font-family: 'Raleway';
        padding: 10px;
        margin-top: 10px;
        cursor: pointer;
        background-color: #ffa337;
        color: white;
    }

    .suppliersList{
        margin-top: 10px;
    }
    .reviewSuppliers{
        padding-left: 10px;
    }
    .reviewSuppliers::before{
        content: '\2022';
        font-weight: bold;
        display: inline-block;
        width: 1em;
    }
    #systemMessage{
        font-size: 18px;
        font-family: Raleway;
        text-align: center;
        font-weight: bold;
    }
</style>
<div class="c100">
    <div class="box" id="systemMessage" style="display: none;">
    </div>
</div>
<div id="cme-rfq-form" class="c100" ng-app="">
    <p id="rfq-form-error-message" style="color: red;"></p>
    <div class="box">
        <!--Pricing Selection division.-->
        <p class="headings"><u>Your Pricing Model</u>
        </p>
        <label>
            <!--            Pricing Model<br>-->
            <input class="image-radio" type="radio" id="rfq-pricing-model" name="rfq_pricing_model" value="total_price" checked>
            <img src="<?php echo plugins_url('constructme/public/img/total-price.png'); ?>" style="width: 100px;display: none;"/>
        </label>
        <div>
            <button class="totalprice">TOTAL PRICE</button>
            <p style="font-size: 14px; font-weight: bold;">
                <i>(Suppliers provide a single price for the entire quote)</i></p>
            <p style="font-size: 12px; font-weight: bold;">
                <i>No Additional Details Required</i></p>
        </div>
    </div>
    <div class="box">
        <!--    RFQ Details section-->
        <p class="headings"><u>Enter Your RFQ Details</u>
        </p>
        <div style="width: 350px; font-family:Raleway; margin-left: 25px;">
            <label class="fieldname">Name<span class="reqasterisk">*</span></label><br>
            <input class="fieldinput" type="text" id="rfq-name" name="rfq_name" required placeholder="Enter RFQ's Name" ng-model="rfq.name"><br>
            <label class="fieldname">Brief Description<span class="reqasterisk">*</span></label><br>
            <textarea class="fieldinput" id="rfq-brief-description" required placeholder="Enter a brief description of the RFQ" ng-model="rfq.description"></textarea>
            <label class="fieldname">Due Date<span class="reqasterisk">*</span></label><br>
            <input class="fieldinput" type="date" id="rfq-due-date" name="rfq_due_date" required placeholder="Enter the Due Date"  ng-model="rfq.dueDate">
            <p style="font-size: 10px; font-weight: bold; margin-top: 0px;"><i>Your suppliers must submit their prices by this date</i>
            </p><br>
            <label class="fieldname">Attachments</label><br>
            <form enctype="multipart/form-data">
                <input type="file" id="rfq-attachment" name="userfile" ng-model="rfq.attachment">
            </form>
            <button id="rfqUploadFile" class="cme-orange-btn" type="button" style="margin-bottom: 10px">Attach Files</button>
            <p style="font-size: 12px; font-weight: bold; margin-top: 0px;"><i>Please compress multiple files into Zip format for multiple uploads.</i></p>
            <div class="fieldname" id="attachmentOutput">
                <!--This section is used to display the attached files for the RFQ.-->
            </div>
        </div>
    </div>
    <!--Select Suppliers Section-->
    <div class="box">
        <p class="headings"><u>Select Your Suppliers</u>
        </p>
        <!--            <label>Select you suppliers</label><br>-->
        <div style="width: 380px; font-family:Raleway; display: inline-block;">
            <input class="fieldinput" type="text" id="rfq-supplier-search" placeholder="Search for suppliers">
            <!--<button id="search-suppliers-button" class="cme-orange-btn" type="button">Search Suppliers</button><br>-->

            <div id="suppliersOutput" style="padding: 10px;">
                <!--<input type="checkbox" name="rfq_supplier[]" value="" style="margin-top: 5px;margin-bottom: 5px;"><span class="lists">Supplier 1</span><br>-->
            </div>
        </div>
        <!--Display Pagination-->
        <div>
            <p style="font-size: 14px; font-weight: bold; margin:auto; font-family: Raleway;"><u>SELECTED SUPPLIERS</u></p>
            <!--Display Selected Suppliers in this section.-->
            <div id="selectedSuppliersOutput" style="padding: 10px;width: 380px">
                <p>Search above and click on the supplier to add to the list.</p>
            </div>
        </div>
    </div>

    <div class="box">
        <!--Review Section to display all the input information from the top form.-->
        <p class="headings"><u>Review and Send</u>
        </p>
        <div style="width: 350px; font-family:Raleway; margin-left: 25px;">
            <label class="fieldname">Name<span class="reqasterisk">*</span></label><br>
            <p class="reviewdetails" id="rfq-review-name">
                <!--Display RFQ Name here.-->
                {{rfq.name}}
            </p>
            <label class="fieldname">Brief Description<span class="reqasterisk">*</span></label><br>
            <p class="reviewdetails" id="rfq-review-description">
                <!--Display RFQ Description here-->
                {{rfq.description}}
            </p>
            <label class="fieldname">Due Date<span class="reqasterisk">*</span></label><br>
            <p class="reviewdetails" id="rfq-review-due-date">
                <!--Display RFQ Due Date here-->
                {{rfq.dueDate|date:"dd.MMMM.y"}}
            </p>
            <!--<label class="fieldname">Pricing and Quantity<span class="reqasterisk">*</span></label><br>-->
            <!--Display Pricing model here-->
            <!--<p class="reviewdetails">Total Price Provided in USD</p>-->
            <label class="fieldname">Attachments</label>
            <p class="reviewdetails" id="rfq-review-attachment">
                <!--Display Attachment File Name/-->
                No File Attached.
            </p>
            <label class="fieldname">Suppliers</label>
            <div class="reviewdetails" id="rfq-review-suppliers">
                <!--Display selected suppliers here. (with the cancel supplier image)-->
            </div>
            <div id="reviewMessage">

            </div>
            <button class="cme-orange-save-send" style="margin-left: 75%" type="button" id="rfq-save-button">Save</button>
            <button class="cme-orange-save-send" style="display: inline; margin-left: auto;" type="button" id="rfq-send-button">Send</button>
        </div>
    </div>
</div>