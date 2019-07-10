
<!--Add Supplier Form-->
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<style>
    .fieldname{
        font-weight: 700;
        font-size: 14px;
    }
    .reqasterisk{
        color: red;
    }
    .fieldinput{
        color: #000000;
        border: none;
        border-bottom: 1px solid black;
        width: 100%;
        margin-bottom: 20px;
        margin-top: 10px;
        padding: 5px;
    }
    .fieldinput::placeholder{
        font-size: 12px;
        font-family: "Raleway";
    }
    input[type="text"], input[type="email"]{
        border: none;
        border-bottom: 1px solid black;
        border-radius: 0;
        width: 100%;
        background-color: #FFFFFF;
        margin-bottom: 20px;
        margin-top: 5px;
        padding: 0px;
    }
    .cme-orange-btn{
        background-color: #FFA337;
        width: auto;
        padding: 3px;
        text-transform: uppercase;
        border: none;
        border-radius: 3px;
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
    .supplierBox{
        border: 2px solid #FFA337;
        box-shadow: 0px 4px 4px -1px grey;
        margin: auto;
        height: auto;
        position: relative;
        padding: 25px;
    }
</style>
<div style="font-family:Raleway;">
    <p style="font-size: 25px; font-weight: 900; text-align: center;"><u>ADD SUPPLIER</u></p>
</div>
<div class="c100 supplierBox" id="systemMessage" style="display: none;">
</div>
<div id="cme-supplier-form" style="width: 300px; font-family:Raleway;">
    <p id="supplier-error-message" style="color: red;"></p>
    <label class="fieldname">Supplier's Name<span class="reqasterisk">*</span></label><br>
    <input class="fieldinput" type="text" id="supplier-name" name="name" placeholder="Enter Supplier's name">
    <label class="fieldname">Supplier's Email<span class="reqasterisk">*</span></label><br>
    <input class="fieldinput" type="email" required id="supplier-email" name="email" placeholder="Enter Supplier's email">
    <label class="fieldname">Contact Person<span class="reqasterisk">*</span></label><br>
    <input class="fieldinput" type="text" id="supplier-contact-name" name="contact_name" placeholder="Contact person name">
    <label class="fieldname">Address<span class="reqasterisk">*</span></label><br>
    <input class="fieldinput" type="text" id="supplier-address" name="address" placeholder="Enter address">
    <label class="fieldname">Phone<span class="reqasterisk">*</span></label><br>
    <input class="fieldinput" type="text" id="supplier-phone" name="phone" placeholder="Phone number">
    <button type="button" id="supplier-register-button" class="cme-orange-btn">Add Supplier</button>
</div>
