<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://cannabiz.pro
 * @since      1.0.0
 *
 * @package    CannaBiz_Analytics
 * @subpackage CannaBiz_Analytics/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    CannaBiz_Analytics
 * @subpackage CannaBiz_Analytics/admin
 * @author     CannaBiz <hello@cannabiz.pro>
 */
class CannaBiz_Analytics_Admin {

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
	 * @param    string    $plugin_name    The name of this plugin.
	 * @param    string    $version        The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {
		// Admin CSS script.
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/cannabiz-analytics-admin.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->plugin_name . '-fontawesome', plugin_dir_url( __FILE__ ) . 'css/fontawesome/css/all.css', array(), $this->version, 'all' );
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		// Create vendors list.
		$vendor_list = array();

		// Get vendors.
		$vendors = get_categories( [
			'taxonomy' => 'vendors',
			'orderby'  => 'count',
			'order'    => 'DESC'
		] );

		foreach ( $vendors as $vendor ) {
			$vendor_list[] = array(
				'name'  => $vendor->name,
				'count' => $vendor->count,
			);
		}

		// Create list of vendor names.
		$vendor_names = array();

		foreach ( $vendor_list as $vendor ) {
			$vendor_names[] = $vendor['name'];
		}

		// Create list of vendor counts.
		$vendor_counts = array();

		foreach ( $vendor_list as $vendor ) {
			$vendor_counts[] = $vendor['count'];
		}

		// Admin JS script.
		wp_enqueue_script( $this->plugin_name . '-charts', 'https://cdn.jsdelivr.net/npm/chart.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/cannabiz-analytics-admin.js', array( 'jquery' ), $this->version, false );
		wp_localize_script( $this->plugin_name, 'chart_vars', array(
			'vendor_names' => $vendor_names,
			'vendor_counts' => $vendor_counts
		) );
	}

}
