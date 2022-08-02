<?php

/**
 * Fired during plugin deactivation
 *
 * @link       dashboard@gmail.com
 * @since      1.0.0
 *
 * @package    Data_Dashboard
 * @subpackage Data_Dashboard/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Data_Dashboard
 * @subpackage Data_Dashboard/includes
 * @author     admin <admin@gmail.com>
 */
class Data_Dashboard_Deactivator
{

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public function deactivate()
	{
		global $wpdb;
		$table_name = $wpdb->prefix . 'users_details';
		$wpdb->query("DROP TABLE IF EXIST $table_name"); // wrong query "EXISTS"
	}
}
