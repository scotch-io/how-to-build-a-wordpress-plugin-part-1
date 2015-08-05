<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://lostwebdesigns.com
 * @since             1.0.0
 * @package           Wp_Cbf
 *
 * @wordpress-plugin
 * Plugin Name:       WP Cleanup and base Functions
 * Plugin URI:        https://github.com/g-kanoufi/wp-cleanup-and-basic-functions
 * Description:       Head section cleanup and many usual custom settings used on every website setup as images settings, privacy and basic admin customisations
 * Version:           1.0.0
 * Author:            Guillaume Kanoufi
 * Author URI:        http://lostwebdesigns.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wp-cbf
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wp-cbf-activator.php
 */
function activate_wp_cbf() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-cbf-activator.php';
	Wp_Cbf_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wp-cbf-deactivator.php
 */
function deactivate_wp_cbf() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-cbf-deactivator.php';
	Wp_Cbf_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wp_cbf' );
register_deactivation_hook( __FILE__, 'deactivate_wp_cbf' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wp-cbf.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wp_cbf() {

	$plugin = new Wp_Cbf();
	$plugin->run();

}
run_wp_cbf();
