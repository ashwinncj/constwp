<?php

//Shortcode registration function here

add_shortcode('constructme-login', 'cme_login_function');

function cme_login_function() {
    require_once plugin_dir_path(dirname(__FILE__)) . 'public/templates/login-tpl.php';
}
