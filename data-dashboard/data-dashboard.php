<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              dashboard@gmail.com
 * @since             1.0.0
 * @package           Data_Dashboard
 *
 * @wordpress-plugin
 * Plugin Name:       data-dashboard
 * Plugin URI:        dashboard@gmail.com
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            admin
 * Author URI:        dashboard@gmail.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       data-dashboard
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define('DATA_DASHBOARD_VERSION', '1.0.0');

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-data-dashboard-activator.php
 */
function activate_data_dashboard()
{
	require_once plugin_dir_path(__FILE__) . 'includes/class-data-dashboard-activator.php';
	$activator= new Data_Dashboard_Activator();
	$activator->activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-data-dashboard-deactivator.php
 */
function deactivate_data_dashboard()
{
	require_once plugin_dir_path(__FILE__) . 'includes/class-data-dashboard-deactivator.php';
	$deactivator = new Data_Dashboard_Deactivator();
	$deactivator->deactivate();
}

register_activation_hook(__FILE__, 'activate_data_dashboard');
register_deactivation_hook(__FILE__, 'deactivate_data_dashboard');

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path(__FILE__) . 'includes/class-data-dashboard.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_data_dashboard()
{

	$plugin = new Data_Dashboard();
	$plugin->run();
}
run_data_dashboard();
