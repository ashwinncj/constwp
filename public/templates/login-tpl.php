
<!--//Login Template-->
<!--Login Methods defined in ConstructMe-public.js-->
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
        box-shadow: none;
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
    <p style="font-size: 25px; font-weight: 900; text-align: center;"><u>LOGIN</u></p>
</div>
<div id="cme-login-form" style="width: 300px; font-family:Raleway;">
    <p id="login-error-message" style="color: red;"></p>
    <label class="fieldname">Email<span class="reqasterisk">*</span></label><br>
    <input class="fieldinput" type="email" required id="user-email" name="user_email" placeholder="Enter your email">
    <label class="fieldname">Password<span class="reqasterisk">*</span></label><br>
    <input class="fieldinput" type="password" required id="user-password" name="user_password" placeholder="Type your password">
    <button type="button" id="user-login-button" class="cme-orange-btn">Login</button>
    <p style="font-size: 10px; font-weight: bolder;"><i>Not a member yet? Click here to Sign Up</i>
    </p>
</div>
<div id="cme-logout-form" class="c100 cme-login-form" style="display: none;">
    <p style="font-family: Raleway;">User Logged in...</p>
    <button type="button" id="user-logout-button"  class="cme-orange-btn" >Logout</button>
</div>
