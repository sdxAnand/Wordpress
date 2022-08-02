<?php

/**
 * Fired during plugin activation
 *
 * @link       dashboard@gmail.com
 * @since      1.0.0
 *
 * @package    Data_Dashboard
 * @subpackage Data_Dashboard/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Data_Dashboard
 * @subpackage Data_Dashboard/includes
 * @author     admin <admin@gmail.com>
 */
class Data_Dashboard_Activator
{

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public function activate()
	{
		global $wpdb;
		$charset_collate = $wpdb->get_charset_collate();
		$table_name = $wpdb->prefix . 'users_details';
		$sql = "CREATE TABLE `$table_name` (
					`id` INT NULL AUTO_INCREMENT,
					`pack_name` VARCHAR(250) NOT NULL,
					`pack_label` VARCHAR(250) NOT NULL,
					`start_date` DATE NOT NULL,
					`start_time` VARCHAR(200) NOT NULL,
					`end_time` VARCHAR(200) NOT NULL,
					PRIMARY KEY (`id`))
				ENGINE = InnoDB
				DEFAULT CHARACTER SET = utf8
				COLLATE = utf8_unicode_ci;
					";
		if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
			require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
			dbDelta($sql);
		}
	}
}
