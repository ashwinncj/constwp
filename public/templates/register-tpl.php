
<!--User registration form-->
<!--Functions handled in constructme-public.js file-->
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
    input[type="text"], input[type="email"], input[type="password"]{
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
        width: 100px;
        padding: 5px;
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
</style>
<div style="font-family:Raleway;">
    <p style="font-size: 25px; font-weight: 900; text-align: center;"><u>SIGN UP</u></p>
</div>
<!--<div id="cme-register-form" class="c100 cme-login-form" style="width: 300px; font-family:'Raleway';">-->
<div id="cme-register-form" style="width: 300px; font-family:Raleway;">
    <p id="register-error-message" style="color: red;"></p>
    <label class="fieldname">Email<span class="reqasterisk">*</span></label><br>
    <input class="fieldinput" type="email" required id="register-user-email" name="user_email" placeholder="Enter your email">
    <label class="fieldname">Password<span class="reqasterisk">*</span></label><br>
    <input class="fieldinput" type="password" required id="register-user-password" name="user_password" placeholder="Type password">
    <label class="fieldname">Confirm Password<span class="reqasterisk">*</span></label><br>
    <input class="fieldinput" type="password" required name="confirm_password" id="register-confirm-password" placeholder="ReType password">
    <button type="button" id="user-register-button" class="cme-orange-btn">Register</button>
    <p style="font-size: 10px; font-weight: bolder;"><i>Already a member? Click here to Login</i>
    </p>
</div>
