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
 * Create the Settings page
 * 
 * @return void
 */
function cannabiz_analytics_add_settings_page() {
    // Add submenu page to the WP Dispensary admin menu.
    add_submenu_page( 'wpd-settings', 'CannaBiz Analytics', 'Analytics', 'manage_options', 'admin.php?page=cannabiz-analytics', NULL );
}
add_action( 'admin_menu', 'cannabiz_analytics_add_settings_page' );
