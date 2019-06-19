
<!--Add RFQ Template Page-->
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
</style>

<div id="cme-rfq-form" class="c100">
    <p id="rfq-form-error-message" style="color: red;"></p>
    <div>
        <!--Pricing Selection division.-->
        <label>
            Pricing Model<br>
            <input class="image-radio" type="radio" id="rfq-pricing-model" name="rfq_pricing_model" value="total_price">
            <img src="<?php echo plugins_url('constructme/public/img/total-price.png'); ?>" style="width: 100px;"/>
            <span style="display: none;">Total Price</span><br>
        </label>
    </div>
    <div>
        <!--    RFQ Details section-->
        <label>Name</label><br>
        <input type="text" id="rfq-name" name="rfq_name"><br>
        <label>Brief Description</label><br>
        <textarea id="rfq-brief-description"></textarea>
        <label>Due Date</label><br>
        <input type="date" id="rfq-due-date" name="rfq_due_date"><br>
        <label>Attachments</label><br>
        <input type="text" id="rfq-attachment" name="rfq_attachment"><br>
    </div>

    <div>
        <!--Select Suppliers Section-->
        <label>Select you suppliers</label><br>
        <input type="text" id="rfq-supplier-search"><button type="button">Search Suppliers</button><br>
        <input type="checkbox" id="rfq-supplier" name="rfq_supplier[]" value=""><span>Supplier 1</span><br>
        <div>
            <!--Display Selected Suppliers in this section.-->
        </div>
    </div>

    <div>
        <!--Review Section to display all the input information from the top form.-->
        <p id="rfq-review-name">
            <!--Display RFQ Name here.-->
        </p>
        <p id="rfq-review-description">
            <!--Display RFQ Description here-->
        </p>
        <p id="rfq-review-due-date">
            <!--Display RFQ Due Date here-->
        </p>
        <p id="rfq-review-attachment">
            <!--Display Attachment File Name/-->
        </p>
        <p id="rfq-review-suppliers">
            <!--Display selected suppliers here.-->
        </p>
        <button type="button" id="rfq-save-button">Save</button>
        <button type="button" id="rfq-send-button">Send</button>
    </div>
</div>
