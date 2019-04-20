<?php

/**
 * @link              https://www.linkedin.com/in/ashwinradel
 * @since             0.1.0
 * @package           Constructme
 *
 * @wordpress-plugin
 * Plugin Name:       ConstructMe
 * Plugin URI:        http://radelcorp.in
 * Description:       ConstructMe API interfacing plugin for Wordpress.
 * Version:           0.1.0
 * Author:            Ashwin Kumar C
 * Author URI:        https://www.linkedin.com/in/ashwinradel
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       constructme
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'CONSTRUCTME_VERSION', '0.1.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-constructme-activator.php
 */
function activate_constructme() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-constructme-activator.php';
	Constructme_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-constructme-deactivator.php
 */
function deactivate_constructme() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-constructme-deactivator.php';
	Constructme_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_constructme' );
register_deactivation_hook( __FILE__, 'deactivate_constructme' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-constructme.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_constructme() {

	$plugin = new Constructme();
	$plugin->run();

}
run_constructme();
