<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @package    CannaBiz_Analytics
 * @subpackage CannaBiz_Analytics/includes
 * @author     CannaBiz Software <contact@cannabiz.pro>
 * @license    GPL-2.0+ https://www.gnu.org/licenses/gpl-2.0.txt
 * @link       https://cannabiz.pro
 * @since      1.0.0
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @package    CannaBiz_Analytics
 * @subpackage CannaBiz_Analytics/includes
 * @author     CannaBiz Software <contact@cannabiz.pro>
 * @license    GPL-2.0+ https://www.gnu.org/licenses/gpl-2.0.txt
 * @link       https://cannabiz.pro
 * @since      1.0.0
 */
class CannaBiz_Analytics {

    /**
     * The loader that's responsible for maintaining and registering 
     * all hooks that power the plugin.
     *
     * @since  1.0.0
     * @access protected
     * @var    CannaBiz_Analytics_Loader    $loader    Maintains and registers all hooks for the plugin.
     */
    protected $loader;

    /**
     * The unique identifier of this plugin.
     *
     * @since  1.0.0
     * @access protected
     * @var    string    $plugin_name 
     */
    protected $plugin_name;

    /**
     * The current version of the plugin.
     *
     * @since  1.0.0
     * @access protected
     * @var    string    $version
     */
    protected $version;

    /**
     * Define the core functionality of the plugin.
     *
     * Set the plugin name and the plugin version that can be used throughout
     * the plugin. Load the dependencies, define the locale, and set the hooks
     * for the admin area and the public-facing side of the site.
     *
     * @since  1.0.0
     * @return void
     */
    public function __construct() {
        $this->plugin_name = 'cannabiz-analytics';
        $this->version     = '1.0.0';
        if ( defined( 'CANNABIZ_ANALYTICS_VERSION' ) ) {
            $this->version = CANNABIZ_ANALYTICS_VERSION;
        }

        $this->load_dependencies();
        $this->set_locale();
        $this->define_admin_hooks();
        $this->define_public_hooks();

    }

    /**
     * Load the required dependencies for this plugin.
     *
     * Include the following files that make up the plugin:
     *
     * - CannaBiz_Analytics_Loader. Orchestrates the hooks of the plugin.
     * - CannaBiz_Analytics_i18n. Defines internationalization functionality.
     * - CannaBiz_Analytics_Admin. Defines all hooks for the admin area.
     * - CannaBiz_Analytics_Public. Defines all hooks for the public side of the site.
     *
     * Create an instance of the loader which will be used to register the hooks
     * with WordPress.
     *
     * @since  1.0.0
     * @access private
     * @return void
     */
    private function load_dependencies() {

        /**
         * The class responsible for orchestrating the actions and filters of the
         * core plugin.
         */
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-cannabiz-analytics-loader.php';

        /**
         * The class responsible for defining internationalization functionality
         * of the plugin.
         */
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-cannabiz-analytics-i18n.php';

        /**
         * The class responsible for defining all actions that occur in the admin area.
         */
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-cannabiz-analytics-admin.php';

        /**
         * The file responsible for defining the helper functions.
         */
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/cannabiz-analytics-helper-functions.php';

        /**
         * The file responsible for defining the admin settings page.
         */
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/cannabiz-analytics-admin-settings.php';

        /**
         * The class responsible for defining all actions that occur in the public-facing
         * side of the site.
         */
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-cannabiz-analytics-public.php';

        $this->loader = new CannaBiz_Analytics_Loader();

    }

    /**
     * Define the locale for this plugin for internationalization.
     *
     * Uses the CannaBiz_Analytics_i18n class in order to set the domain and
     * to register the hook with WordPress.
     *
     * @since  1.0.0
     * @access private
     * @return void
     */
    private function set_locale() {

        $plugin_i18n = new CannaBiz_Analytics_i18n();

        $this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

    }

    /**
     * Register all of the hooks related to the admin area functionality
     * of the plugin.
     *
     * @since  1.0.0
     * @access private
     * @return void
     */
    private function define_admin_hooks() {

        $plugin_admin = new CannaBiz_Analytics_Admin( $this->get_plugin_name(), $this->get_version() );

        $this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
        $this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );

    }

    /**
     * Register all of the hooks related to the public-facing functionality
     * of the plugin.
     *
     * @since  1.0.0
     * @access private
     * @return void
     */
    private function define_public_hooks() {

        $plugin_public = new CannaBiz_Analytics_Public( $this->get_plugin_name(), $this->get_version() );

        $this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
        $this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );

    }

    /**
     * Run the loader to execute all of the hooks with WordPress.
     *
     * @since  1.0.0
     * @return void
     */
    public function run() {
        $this->loader->run();
    }

    /**
     * The name of the plugin used to uniquely identify it within the context of
     * WordPress and to define internationalization functionality.
     *
     * @since  1.0.0
     * @return string    The name of the plugin.
     */
    public function get_plugin_name() {
        return $this->plugin_name;
    }

    /**
     * The reference to the class that orchestrates the hooks with the plugin.
     *
     * @since  1.0.0
     * @return CannaBiz_Analytics_Loader    Orchestrates the hooks of the plugin.
     */
    public function get_loader() {
        return $this->loader;
    }

    /**
     * Retrieve the version number of the plugin.
     *
     * @since  1.0.0
     * @return string    The version number of the plugin.
     */
    public function get_version() {
        return $this->version;
    }

}
