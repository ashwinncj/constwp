
<!--//Login Template-->
<!--Login Methods defined in ConstructMe-public.js-->

<div id="cme-login-form" class="c100 cme-login-form">
    <p id="login-error-message" style="color: red;"></p>
    <label>Email*</label>
    <input type="email" required id="user-email" name="user_email">
    <label>Password*</label>
    <input type="password" required id="user-password" name="user_password">
    <button type="button" id="user-login-button" style="width: 150px; border: none;cursor: pointer;box-shadow: 1px 1px 3px 1px gray">Login</button>
</div>
<div id="cme-logout-form" class="c100 cme-login-form" style="display: none;">
    <button type="button" id="user-logout-button" style="width: 150px; border: none;cursor: pointer;box-shadow: 1px 1px 3px 1px gray">Logout</button>
</div>
