<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @package    CannaBiz_Analytics
 * @subpackage CannaBiz_Analytics/includes
 * @author     CannaBiz Software <contact@cannabiz.pro>
 * @license    GPL-2.0+ https://www.gnu.org/licenses/gpl-2.0.txt
 * @link       https://cannabiz.pro
 * @since      1.0.0
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @package    CannaBiz_Analytics
 * @subpackage CannaBiz_Analytics/includes
 * @author     CannaBiz Software <contact@cannabiz.pro>
 * @license    GPL-2.0+ https://www.gnu.org/licenses/gpl-2.0.txt
 * @link       https://cannabiz.pro
 * @since      1.0.0
 */
class CannaBiz_Analytics_i18n {

    /**
     * Load the plugin text domain for translation.
     *
     * @since  1.0.0
     * @return void
     */
    public function load_plugin_textdomain() {

        load_plugin_textdomain(
            'cannabiz-analytics',
            false,
            dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
        );

    }

}
