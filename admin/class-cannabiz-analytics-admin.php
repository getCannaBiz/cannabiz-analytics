<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @package    CannaBiz_Analytics
 * @subpackage CannaBiz_Analytics/admin
 * @author     CannaBiz Software <contact@cannabiz.pro>
 * @license    GPL-2.0+ https://www.gnu.org/licenses/gpl-2.0.txt
 * @link       https://cannabiz.pro
 * @since      1.0.0
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    CannaBiz_Analytics
 * @subpackage CannaBiz_Analytics/admin
 * @author     CannaBiz Software <contact@cannabiz.pro>
 * @license    GPL-2.0+ https://www.gnu.org/licenses/gpl-2.0.txt
 * @link       https://cannabiz.pro
 * @since      1.0.0
 */
class CannaBiz_Analytics_Admin {

    /**
     * The ID of this plugin.
     *
     * @since  1.0.0
     * @access private
     * @var    string    $_plugin_name    The ID of this plugin.
     */
    private $_plugin_name;

    /**
     * The version of this plugin.
     *
     * @since  1.0.0
     * @access private
     * @var    string    $_version    The current version of this plugin.
     */
    private $_version;

    /**
     * Initialize the class and set its properties.
     *
     * @param string $_plugin_name The name of this plugin.
     * @param string $_version     The version of this plugin.
     * 
     * @since 1.0.0
     */
    public function __construct( $_plugin_name, $_version ) {

        $this->plugin_name = $_plugin_name;
        $this->version     = $_version;

    }

    /**
     * Register the stylesheets for the admin area.
     *
     * @since  1.0.0
     * @return void
     */
    public function enqueue_styles() {
        // Admin CSS script.
        wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/cannabiz-analytics-admin.css', array(), $this->version, 'all' );
        wp_enqueue_style( $this->plugin_name . '-fontawesome', plugin_dir_url( __FILE__ ) . 'css/fontawesome/css/all.css', array(), $this->version, 'all' );
    }

    /**
     * Register the JavaScript for the admin area.
     *
     * @since  1.0.0
     * @return void
     */
    public function enqueue_scripts() {
        $details       = wpd_ecommerce_get_orders_details();
        $pcounts       = array();
        $pnames        = array();
        $ptypes_counts = array();
        $ptypes_names  = array();
        $strain_counts = array();
        $strain_names  = array();
        $shelf_counts  = array();
        $shelf_names   = array();
        $vendor_counts = array();
        $vendor_names  = array();

        // Strain Types.
        foreach ( $details['strain_types'] as $key=>$val ) {
            $term = get_term( $key );
            if ( $term ) {
                $strain_counts[] = $val;
                $strain_names[]  = htmlentities( $term->name );
            }
        }

        // Shelf Types.
        foreach ( $details['shelf_types'] as $key=>$val ) {
            $term = get_term( $key );
            if ( $term ) {
                $shelf_counts[] = $val;
                $shelf_names[]  = htmlentities( $term->name );
            }
        }

        // Vendors.
        foreach ( $details['vendors'] as $key=>$val ) {
            $term = get_term( $key );
            if ( $term ) {
                $vendor_counts[] = $val;
                $vendor_names[]  = htmlentities( $term->name );
            }
        }

        // Get product type counts.
        $type_counts = array_count_values( $details['product_types'] );

        // Get product type details.
        foreach ( $type_counts as $type=>$count ) {
            $ptypescounts[] = $count;
            $ptypesnames[]  = wpd_product_type_display_name( $type );
        }

        // Get customer counts.
        $customer_counts = array_count_values( $details['orders_customers'] );

        // Get order customer count details.
        foreach ( $customer_counts as $customer=>$count ) {
            $customer_count[]  = $count;
            $customer_names[]  = cannabiz_get_display_name( $customer ) . ' (ID: ' . $customer . ')';
        }
        // Get order customer total sales details.
        foreach ( $details['orders_customers_sales'] as $total ) {
            $customer_totals[] = $total;
        }

        // Get product count details.
        foreach ( $details['product_counts'] as $product_id=>$count ) {
            $pcounts[] = $count;
            $pnames[]  = get_the_title( $product_id );
        }

//        $pcounts = array_slice( $pcounts, 0, 10 );
//        $pnames  = array_slice( $pnames, 0, 10 );

        // Admin JS script.
        wp_enqueue_script( $this->plugin_name . '-charts', plugin_dir_url( __FILE__ ) . 'js/chart.js', array( 'jquery' ), $this->version, false );
        wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/cannabiz-analytics-admin.js', array( 'jquery' ), $this->version, false );
        wp_localize_script( $this->plugin_name, 'chart_vars', array(
            // Order sales details.
            'orders_strain_names'          => $strain_names,
            'orders_strain_counts'         => $strain_counts,
            'orders_shelf_names'           => $shelf_names,
            'orders_shelf_counts'          => $shelf_counts,
            'orders_vendor_names'          => $vendor_names,
            'orders_vendor_counts'         => $vendor_counts,
            'orders_product_types_names'   => $ptypesnames,
            'orders_product_types_counts'  => $ptypescounts,
            'orders_customer_names'        => $customer_names,
            'orders_customer_counts'       => $customer_count,
            'orders_customer_sales_totals' => $customer_totals,
            // General order details.
            'product_names'  => $pnames,
            'product_counts' => $pcounts,
            'vendor_names'   => get_wpd_vendors_details( 'names' ),
            'vendor_counts'  => get_wpd_vendors_details( 'counts' ),
            'strain_names'   => get_wpd_strain_types_details( 'names' ),
            'strain_counts'  => get_wpd_strain_types_details( 'counts' ),
            'shelf_names'    => get_wpd_shelf_types_details( 'names' ),
            'shelf_counts'   => get_wpd_shelf_types_details( 'counts' ),
            'type_names'     => get_wpd_product_types_details( 'names' ),
            'type_counts'    => get_wpd_product_types_details( 'counts' ),
        ) );
    }

}
