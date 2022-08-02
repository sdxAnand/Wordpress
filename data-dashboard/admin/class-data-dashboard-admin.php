<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       dashboard@gmail.com
 * @since      1.0.0
 *
 * @package    Data_Dashboard
 * @subpackage Data_Dashboard/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Data_Dashboard
 * @subpackage Data_Dashboard/admin
 * @author     admin <admin@gmail.com>
 */
class Data_Dashboard_Admin
{

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct($plugin_name, $version)
	{

		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles()
	{

		wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/data-dashboard-admin.css');
		wp_enqueue_style($this->plugin_name . '_dataTables', 'https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css');
		wp_enqueue_style($this->plugin_name . '_bootstraps', plugin_dir_url(__FILE__) . 'bootstrap/css/bootstrap.min.css');
		wp_enqueue_style($this->plugin_name . '_datatables-buttons', 'https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css');
		wp_enqueue_style($this->plugin_name . '_datatableStyles', 'https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.css');
	}


	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts()
	{

		wp_enqueue_script($this->plugin_name.'customJSAdmin', plugin_dir_url(__FILE__) . 'js/data-dashboard-admin.js');
		wp_enqueue_script($this->plugin_name . '_jQuery', 'https://code.jquery.com/jquery-3.5.1.js', array('jquery'), $this->version, false);
		wp_enqueue_script($this->plugin_name . '_dataTables', 'https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js', array('jquery'), $this->version, false);
		wp_enqueue_script($this->plugin_name . '_datatables-buttons', 'https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js', array('jquery'));
		wp_enqueue_script($this->plugin_name . '_datatables-jszip', 'https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js', array('jquery'));
		wp_enqueue_script($this->plugin_name . '_datatables-pdf', 'https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js', array('jquery'));
		wp_enqueue_script($this->plugin_name . '_datatables-vfonts', 'https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js', array('jquery'));
		wp_enqueue_script($this->plugin_name . '_datatables-html5', 'https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js', array('jquery'));
		wp_enqueue_script($this->plugin_name . '_datatables-print', 'https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js', array('jquery'));
		wp_enqueue_script($this->plugin_name . '_datatables-scroller', 'https://cdn.datatables.net/scroller/2.0.7/js/dataTables.scroller.min.js', array('jquery'));
		wp_localize_script($this->plugin_name  . '_dataTables', 'datatablesajax', array('url' => admin_url('admin-ajax.php')));
	}
	public function dashboard_admin_menu()
	{
		add_menu_page('Dashboard', 'Dashboard', 'edit_dashboard', 'dashboard-menu', array($this, 'dashboard_menu_page'), '', '22');
		add_submenu_page('dashboard-menu', 'Form-service', 'Form-service', 'manage_options', 'form_service', array($this, 'form_submit_submenu_page'));
		add_submenu_page('dashboard-menu', 'Bootstrap Panel', 'Bootstrap Panel', 'manage_options', 'bootstrap', array($this, 'bootstrap_page'));
		add_submenu_page('dashboard-menu', 'Form-edit', 'Form-edit', 'manage_options', 'edit_form', array($this, 'form_edit_page'));
		add_submenu_page('dashboard-menu', 'Order Details', 'Order Details', 'manage_options', 'order_details', array($this, 'order_details_page'));
	}

	public function dashboard_menu_page()
	{
		echo "<h2>This is dashboard admin menu page</h2>";
		// include_once __DIR__ . '/templates/Show-DataTable.php';
		include_once __DIR__ . '/templates/show-form-data.php';
	}
	public function form_submit_submenu_page()
	{
		echo "<h2>This is form submit sub-menu page</h2>";
		include_once __DIR__ . '/templates/form-data.php';
	}
	public function bootstrap_page()
	{
		include_once __DIR__ . '/templates/bootstrap-panel.php';
	}
	public function form_edit_page()
	{
		include_once __DIR__ . '/templates/edit-page.php';
	}
	public function order_details_page()
	{
		include_once __DIR__ . '/templates/order_dataTable.php';
	}


	public function show_dataf()
	{

		global $wpdb;
		$table_name = $wpdb->prefix . 'free_package_dates';
		$Master_table = $wpdb->prefix . 'free_packages';
		$result = $wpdb->get_results("SELECT wp_free_packages.id, wp_free_packages.pack_name, wp_free_packages.label, wp_free_package_dates.start_date, wp_free_package_dates.start_time, wp_free_package_dates.end_time 
									FROM $table_name  INNER JOIN $Master_table  ON wp_free_package_dates.pack_id=wp_free_packages.id");
		// $table_name = $wpdb->prefix . 'users_details';
		// $result = $wpdb->get_results("SELECT * FROM $table_name");
		$res = array();
		$id = 0;
		foreach ($result as $data) {
			$user_id = $data->id;
			$edit = '<a class="btn btn-success" target="_blank" id=edit_' . $user_id . ' href="?page=edit_for&=' . $data->id . '" >Edit</a>';
			$del = '<button class="btn btn-danger"  id=del_' . $user_id . ' onclick="delete_data(this,' . $data->id . ')" >Delete</button>';
			$id += 1;
			$dataa['user_id'] = $id;
			$dataa['pack_name'] = $data->pack_name;
			$dataa['label'] = $data->label;
			$dataa['start_date'] = $data->start_date;
			$dataa['start_time'] = $data->start_time;
			$dataa['end_time'] = $data->end_time;
			$dataa['action'] = $del . " " . $edit;
			array_push($res, $dataa);
		}
		echo wp_json_encode(array('data' => $res));
		wp_die();
	}
	public function show_order_details()
	{

		global $wpdb;
		$order_details = $wpdb->prefix . 'order_details';
		$result = $wpdb->get_results("SELECT * FROM $order_details ");
		$res = array();
		// $id = 0;
		foreach ($result as $data) {
			// $id += 1;
			$dataa['order_id'] = $data->Order_id;
			$dataa['total_bill'] = $data->Order_total;
			$dataa['product_name'] = $data->Order_item_name;
			$dataa['quantity'] = $data->Order_quantity;
			$dataa['country'] = $data->Billing_country;
			$dataa['state'] = $data->Billing_state;
			$dataa['city'] = $data->Billing_city;
			$dataa['phone'] = $data->Billing_phone;
			array_push($res, $dataa);
		}
		echo wp_json_encode(array('data' => $res));
		wp_die();
	}
	
	public function delete_data_function()
	{
		global $wpdb;
		$table_name = $wpdb->prefix . 'free_package_dates';
		$Master_table = $wpdb->prefix . 'free_packages';
		if (isset($_GET['id'])) {
			$del_id = $_GET['id'];
			$wpdb->query("DELETE FROM $table_name WHERE id='$del_id'");
			$wpdb->query("DELETE FROM $Master_table WHERE id='$del_id'");
		}
	}
}
