<?php

/**
 * Helper functions used throughout the plugin
 *
 * @link       https://cannabiz.pro
 * @since      1.0.0
 *
 * @package    CannaBiz_Analytics
 * @subpackage CannaBiz_Analytics/includes
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	wp_die();
}

/**
 * Get display name by ID
 * 
 * @return bool|string
 */
function cannabiz_get_display_name( $user_id ) {
	// Check if no user exists and return false.
    if ( ! $user = get_userdata( $user_id ) ) {
		return false;
	}
	// Return the display name.
	return esc_html( $user->data->display_name );
}
