<?php

//Shortcode registration function here

add_shortcode('constructme-login', 'cme_login_function');
add_shortcode('constructme-register', 'cme_register_function');

function cme_login_function() {
    ob_start();
    require_once plugin_dir_path(dirname(__FILE__)) . 'public/templates/login-tpl.php';
    return ob_get_clean();
}

function cme_register_function() {
    ob_start();
    require_once plugin_dir_path(dirname(__FILE__)) . 'public/templates/register-tpl.php';
    return ob_get_clean();
}
