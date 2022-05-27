<?php

/**
 * Helper functions used throughout the plugin
 *
 * @package    CannaBiz_Analytics
 * @subpackage CannaBiz_Analytics/includes
 * @author     CannaBiz Software <contact@cannabiz.pro>
 * @license    GPL-2.0+ https://www.gnu.org/licenses/gpl-2.0.txt
 * @link       https://cannabiz.pro
 * @since      1.0.0
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    wp_die();
}

/**
 * Get display name by ID
 * 
 * @param int $user_id 
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
