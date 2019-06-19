
<!--Add RFQ Template Page-->
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
<link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet'>
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
        margin-left: 25%;
        /*margin-top: -25px;*/
        width: 710px;
        height: auto;
        position: relative;
        margin-top: 50px;
    }
    /*Box headings styles*/
    .headings{
        font-size: 16px;
        font-weight: 900;
        margin-left: 25px;
        margin-top: 10px;
        font-family: 'Raleway';
    }
    input[type="text"], input[type="date"]{
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
        font-family: 'Raleway';
    }
    .cme-orange-btn{
        background-color: #FFA337;
        width: auto;
        padding: 5px;
        text-transform: uppercase;
        border: none;
        border-radius: 5px;
        font-family: 'Raleway';
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
        font-family: 'Raleway';
        font-weight: 600;
        color: white;
        font-size: 12px;
    }
    /*Save-send button in Review and send box styles*/
    .cme-orange-save-send{
        background-color: #FFA337;
        border: none;
        border-radius: 3px;
        font-family: 'Raleway';
        font-weight: 600;
        color: white;
        font-size: 12px;
        align-content: center;
        margin-top: 20px;
        margin-bottom: 10px;
        box-shadow: 0px 0px 2px 0px grey;
        cursor: pointer;
    }
    /*    Supplier lists display styles*/
    .lists{
        font-size: 14px;
        font-weight: bold;
        margin-left: 5px;
    }
    /*Review and Send box styles*/
    .reviewdetails{
        font-size: 14px;
        font-weight: 500;
        font-family: 'Raleway';
        color: #000000;
        margin-top: 2px;
    }
</style>

<div id="cme-rfq-form" class="c100" ng-app="">
    <p id="rfq-form-error-message" style="color: red;"></p>
    <div class="box">
        <!--Pricing Selection division.-->
        <p class="headings"><u>Your Pricing Model</u>
        </p>
        <label>
            <!--            Pricing Model<br>-->
            <input class="image-radio" type="radio" id="rfq-pricing-model" name="rfq_pricing_model" value="total_price" checked>
            <img src="<?php echo plugins_url('constructme/public/img/total-price.png'); ?>" style="width: 100px;"/>
            <span style="display: none;">Total Price</span><br>
        </label>
    </div>
    <div class="box">
        <!--    RFQ Details section-->
        <p class="headings"><u>Enter Your RFQ Details</u>
        </p>
        <div style="width: 350px; font-family:'Raleway'; margin-left: 25px;">
            <label class="fieldname">Name<span class='reqasterisk'>*</span></label><br>
            <input class="fieldinput" type="text" id="rfq-name" name="rfq_name" required placeholder="Enter RFQ's Name" ng-model="rfq.name"><br>
            <label class="fieldname">Brief Description<span class='reqasterisk'>*</span></label><br>
            <textarea class="fieldinput" id="rfq-brief-description" required placeholder="Enter a brief description of the RFQ" ng-model="rfq.description"></textarea>
            <label class="fieldname">Due Date<span class='reqasterisk'>*</span></label><br>
            <input class="fieldinput" type="date" id="rfq-due-date" name="rfq_due_date" required placeholder="Enter the Due Date"  ng-model="rfq.dueDate">
            <p style="font-size: 10px; font-weight: bold; margin-top: 0px;"><i>Your suppliers must submit their prices by this date</i>
            </p><br>
            <label class="fieldname">Attachments</label><br>
            <input type="text" id="rfq-attachment" name="rfq_attachment" ng-model="rfq.attachment"><br>
            <button class="cme-orange-btn" type="button" style="margin-bottom: 10px">Attach Files</button>
        </div>
    </div>
    <!--Select Suppliers Section-->
    <div class="box">
        <p class="headings"><u>Select Your Suppliers</u>
        </p>
        <!--            <label>Select you suppliers</label><br>-->
        <div style="width: 380px; font-family:'Raleway'; margin-left: 25%; display: inline-block;">
            <input class="fieldinput" type="text" id="rfq-supplier-search" placeholder="Search for suppliers"><button class="cme-orange-btn" type="button">Search Suppliers</button><br>
            <input type="checkbox" id="rfq-supplier" name="rfq_supplier[]" value="" style="margin-top: 30px;"><span class="lists">Supplier 1</span><br>
        </div>
        <!--Display Pagination-->
        <div>
            <p style="font-size: 14px; font-weight: bold; margin-left: 25px; font-family: Raleway;"><u>SELECTED SUPPLIERS</u></p>
            <!--Display Selected Suppliers in this section.-->
        </div>
    </div>

    <div class="box">
        <!--Review Section to display all the input information from the top form.-->
        <p class="headings"><u>Review and Send</u>
        </p>
        <div style="width: 350px; font-family:'Raleway'; margin-left: 25px;">
            <label class="fieldname">Name<span class='reqasterisk'>*</span></label><br>
            <p class="reviewdetails" id="rfq-review-name">
                <!--Display RFQ Name here.-->
                {{rfq.name}}
            </p>
            <label class="fieldname">Brief Description<span class='reqasterisk'>*</span></label><br>
            <p class="reviewdetails" id="rfq-review-description">
                <!--Display RFQ Description here-->
                {{rfq.description}}
            </p>
            <label class="fieldname">Due Date<span class='reqasterisk'>*</span></label><br>
            <p class="reviewdetails" id="rfq-review-due-date">
                <!--Display RFQ Due Date here-->
                {{rfq.dueDate|date:"dd.MMMM.y"}}
            </p>
            <label class="fieldname">Pricing and Quantity<span class='reqasterisk'>*</span></label><br>
            <!--Display Pricing model here-->
            <p class="reviewdetails">Total Price Provided in USD</p>
            <label class="fieldname">Attachments</label>
            <p class="reviewdetails" id="rfq-review-attachment">
                <!--Display Attachment File Name/-->
                {{rfq.attachment}}
            </p>
            <label class="fieldname">Suppliers</label>
            <p class="reviewdetails" id="rfq-review-suppliers">
                <!--Display selected suppliers here. (with the cancel supplier image)-->
            </p>
            <button class="cme-orange-save-send" style="margin-left: 75%" type="button" id="rfq-save-button">Save</button>
            <button class="cme-orange-save-send" style="display: inline; margin-left: auto;" type="button" id="rfq-send-button">Send</button>
        </div>
    </div>
</div>