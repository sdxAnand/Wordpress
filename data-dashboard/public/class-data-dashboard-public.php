<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       dashboard@gmail.com
 * @since      1.0.0
 *
 * @package    Data_Dashboard
 * @subpackage Data_Dashboard/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Data_Dashboard
 * @subpackage Data_Dashboard/public
 * @author     admin <admin@gmail.com>
 */
class Data_Dashboard_Public
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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct($plugin_name, $version)
	{

		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 * 
	 */
	public function enqueue_styles()
	{

		wp_enqueue_style($this->plugin_name . '_customCSS', plugin_dir_url(__FILE__) . 'css/data-dashboard-public.css', array(), rand(111, 9999), 'all');
		wp_enqueue_style($this->plugin_name . '_dataTables', 'https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css');
		wp_enqueue_style($this->plugin_name . '_datatables-buttons', 'https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css');
		wp_enqueue_style($this->plugin_name . '_datatableStyles', 'https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.css');
		wp_enqueue_style($this->plugin_name . '_bootstrapCSS', plugin_dir_url(__FILE__) . 'css/bootstrap.min.css');
	}

	/**array(), rand(111, 9999), 'all'
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts()
	{
		wp_enqueue_script($this->plugin_name . '_customJS', plugin_dir_url(__FILE__) . 'js/data-dashboard-admin.js', array(), rand(111, 9999), 'all');
		wp_enqueue_script($this->plugin_name . '_jQuery', 'https://code.jquery.com/jquery-3.5.1.js', array('jquery'), $this->version, false);
		wp_enqueue_script($this->plugin_name . '_dataTables', 'https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js', array('jquery'), $this->version, false);
		wp_enqueue_script($this->plugin_name . '_datatables-buttons', 'https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js', array('jquery'));
		wp_enqueue_script($this->plugin_name . '_datatables-jszip', 'https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js', array('jquery'));
		wp_enqueue_script($this->plugin_name . '_datatables-pdf', 'https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js', array('jquery'));
		wp_enqueue_script($this->plugin_name . '_datatables-vfonts', 'https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js', array('jquery'));
		wp_enqueue_script($this->plugin_name . '_datatables-html5', 'https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js', array('jquery'));
		wp_enqueue_script($this->plugin_name . '_datatables-print', 'https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js', array('jquery'));
		wp_enqueue_script($this->plugin_name . '_bootstrapsJS', plugin_dir_url(__FILE__) . 'js/bootstrap.min.js');
		wp_localize_script($this->plugin_name  . '_dataTables', 'datatablesajax', array('url' => admin_url('admin-ajax.php')));
	}
	public function dashboard_admin_menu()
	{
		add_menu_page('Bootstrap Panel', 'Bootstrap Panel', 'manage_options', 'bootstrap_panel', array($this, 'bootstrap_panel_page'), '', '22');
		add_submenu_page('bootstrap_panel', 'Form-service', 'Form-service', 'manage_options', 'form_services', array($this, 'registration_form_page'));
		add_submenu_page('bootstrap_panel', 'Datatable', 'Datatable', 'manage_options', 'data_table', array($this, 'show_form_dataTable'));
		add_submenu_page('bootstrap_panel', 'Form-edit', 'Form-edit', 'manage_options', 'form_edits', array($this, 'form_edit_page'));
		add_submenu_page('bootstrap_panel', 'Panel', 'Panel', 'manage_options', 'panel_page', array($this, 'panel_page'));
	}
	// public function bootstrap_panel_page()
	// {

	// 	ob_start();
	// 	include_once __DIR__ . '/templates/bootstrap-panel.php';
	// $template = ob_get_contents();
	// ob_get_clean();
	// echo $template;
	// }

	public function registration_form_page()
	{
		ob_start();
		include_once __DIR__ . '/templates/form-data.php';
		$template = ob_get_contents();
		ob_get_clean();
		echo $template;
	}
	public function bootstrap_panel_page()
	{
		ob_start();
		include_once __DIR__ . '/templates/hello.php';
		$template = ob_get_contents();
		ob_get_clean();
		echo $template;
	}
	public function form_edit_page()
	{
		ob_start();
		include_once __DIR__ . '/templates/edit-page.php';
		$template = ob_get_contents();
		ob_get_clean();
		echo $template;
	}
	public function show_form_dataTable()
	{
		ob_start();
		include_once __DIR__ . '/templates/show-form-data.php';
		$template = ob_get_contents();
		ob_get_clean();
		echo $template;
	}
	public function panel_page()
	{
		ob_start();
		include_once __DIR__ . '/templates/panel2.php';
		$template = ob_get_contents();
		ob_get_clean();
		echo $template;
	}

	public function show_data()
	{

		global $wpdb;
		$table_name = $wpdb->prefix . 'free_package_dates';
		$Master_table = $wpdb->prefix . 'free_packages';
		$result = $wpdb->get_results("SELECT wp_free_packages.id, wp_free_packages.pack_name, wp_free_packages.label, wp_free_package_dates.start_date, wp_free_package_dates.start_time, wp_free_package_dates.end_time 
									FROM $table_name  INNER JOIN $Master_table  ON wp_free_package_dates.pack_id=wp_free_packages.id");
		$res = array();
		$id = 0;
		foreach ($result as $data) {
			$user_id = $data->id;
			$edit = '<a class="btn btn-success" target="_blank" id=edit_" . $user_id . " href ="admin.php?page=form_edits&edit=' . $data->id . '" >Edit</a>';
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
	function custome_add_to_cart()
	{
		global $wpdb;
		global $woocommerce;
		global $product;
		if (isset($_GET['product_id'])) {
			$product_id = $_GET['product_id'];
			echo $product_id;
			// Prevent the add_to_cart action from looping
			// remove_action('woocommerce_add_to_cart', __FUNCTION__);

			WC()->cart->add_to_cart($product_id);
		}
	}


	public function enroll_student($order_id)
	{
		global $wpdb;
		global $woocommerce;
		global $product;
		global $order;
		$order_details = $wpdb->prefix . 'order_details';
		if ($order_id) {
			$order = wc_get_order($order_id);
			foreach ($order->get_items() as $item_id => $item) {
				$order_id = $order->get_id();
				// $order_total = $order->get_total();
				$order_total = $item->get_total();
				$product_name = $item->get_name();
				$order_quantity = $item->get_quantity();
				$billing_country = $order->get_billing_country();
				$billing_state = $order->get_billing_state();
				$billing_city = $order->get_billing_city();
				$billing_phone = $order->get_billing_phone();
				$wpdb->query("INSERT INTO $order_details( Order_id, Order_total, Order_item_name, Order_quantity, Billing_country, Billing_state, Billing_city, Billing_phone) 
		VALUES('$order_id','$order_total','$product_name','$order_quantity', '$billing_country', '$billing_state','$billing_city','$billing_phone')");
			}
		}
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
