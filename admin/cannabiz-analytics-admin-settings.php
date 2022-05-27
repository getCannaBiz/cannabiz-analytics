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
 * Adds a menu item for the Analytics page.
 *
 * @since 1.0.0
 */
function cannabiz_analytics_settings_page_menu() {

    add_submenu_page(
        'wpd-settings',
        __( 'CannaBiz Analytics', 'cannabiz-analytics' ),
        __( 'Analytics', 'cannabiz-analytics' ),
        'manage_options',
        'analytics',
        'cannabiz_analytics_settings_page'
    );

}
add_action( 'admin_menu', 'cannabiz_analytics_settings_page_menu', 99 );

/**
 * Outputs the markup used on the Getting Started
 *
 * @since  1.0.0
 * @return void
 */
function cannabiz_analytics_settings_page() {
    ?>
    <div class="wrap cannabiz-analytics">
        <div class="intro-wrap">
            <div class="intro">
                <a href="<?php echo esc_url( 'https://cannabiz.pro/' ); ?>"><img class="dispensary-logo" src="<?php echo esc_url( plugins_url( 'images/logo.png', __FILE__ ) ); ?>" alt="<?php esc_html_e( 'Visit CannaBiz', 'cannabiz-analytics' ); ?>" /></a>
                <h3><?php printf( esc_html__( 'Getting started with', 'cannabiz-analytics' ) ); ?> <strong><?php printf( esc_html__( 'CannaBiz Analytics', 'cannabiz-analytics' ) ); ?></strong></h3>
            </div>
        </div>

        <div class="panels">
            <div id="panel" class="panel">
                <div id="cannabiz-analytics-panel" class="panel-left visible">
                    <div class="block-feature-wrap clear">
                        <div class="cannabiz-analytics-charts">

                            <div class="viewport-main three">
                                <div class="viewport-top">
                                    <div class="viewport-top-dot"></div>
                                    <div class="viewport-top-dot"></div>
                                    <div class="viewport-top-dot"></div>
                                    <span class="title"><?php esc_attr_e( 'Sales by Strain', 'cannabiz-analytics' ); ?></span>
                                </div><!-- /.viewport-top -->
                                <div class="viewport-body">
                                    <canvas id="strain-sales-pie-chart"></canvas>
                                </div><!-- /.viewport-body -->
                            </div><!-- /.viewport-main.three -->

                            <div class="viewport-main three">
                                <div class="viewport-top">
                                    <div class="viewport-top-dot"></div>
                                    <div class="viewport-top-dot"></div>
                                    <div class="viewport-top-dot"></div>
                                    <span class="title"><?php esc_attr_e( 'Sales by Shelf', 'cannabiz-analytics' ); ?></span>
                                </div><!-- /.viewport-top -->
                                <div class="viewport-body">
                                    <canvas id="shelf-sales-pie-chart"></canvas>
                                </div><!-- /.viewport-body -->
                            </div><!-- /.viewport-main.three -->

                            <div class="viewport-main three">
                                <div class="viewport-top">
                                    <div class="viewport-top-dot"></div>
                                    <div class="viewport-top-dot"></div>
                                    <div class="viewport-top-dot"></div>
                                    <span class="title"><?php esc_attr_e( 'Sales by Type', 'cannabiz-analytics' ); ?></span>
                                </div><!-- /.viewport-top -->
                                <div class="viewport-body">
                                    <canvas id="product-types-pie-chart"></canvas>
                                </div><!-- /.viewport-body -->
                            </div><!-- /.viewport-main.three -->

                            <div class="viewport-main">
                                <div class="viewport-top">
                                    <div class="viewport-top-dot"></div>
                                    <div class="viewport-top-dot"></div>
                                    <div class="viewport-top-dot"></div>
                                    <span class="title"><?php esc_attr_e( 'Sales by Product', 'cannabiz-analytics' ); ?></span>
                                </div><!-- /.viewport-top -->
                                <div class="viewport-body">
                                    <canvas id="bar-chart"></canvas>
                                </div><!-- /.viewport-body -->
                            </div><!-- /.viewport-main -->

                            <div class="viewport-main">
                                <div class="viewport-top">
                                    <div class="viewport-top-dot"></div>
                                    <div class="viewport-top-dot"></div>
                                    <div class="viewport-top-dot"></div>
                                    <span class="title"><?php esc_attr_e( 'Sales by Vendor', 'cannabiz-analytics' ); ?></span>
                                </div><!-- /.viewport-top -->
                                <div class="viewport-body">
                                    <canvas id="vendor-sales-bar-chart"></canvas>
                                </div><!-- /.viewport-body -->
                            </div><!-- /.viewport-main -->

                            <div class="viewport-main">
                                <div class="viewport-top">
                                    <div class="viewport-top-dot"></div>
                                    <div class="viewport-top-dot"></div>
                                    <div class="viewport-top-dot"></div>
                                    <span class="title"><?php esc_attr_e( 'Sales by Customer', 'cannabiz-analytics' ); ?></span>
                                </div><!-- /.viewport-top -->
                                <div class="viewport-body">
                                    <canvas id="customer-sales-bar-chart"></canvas>
                                </div><!-- /.viewport-body -->
                            </div><!-- /.viewport-main -->

                            <div class="viewport-main">
                                <div class="viewport-top">
                                    <div class="viewport-top-dot"></div>
                                    <div class="viewport-top-dot"></div>
                                    <div class="viewport-top-dot"></div>
                                    <span class="title"><?php esc_attr_e( 'Sales Total by Customer', 'cannabiz-analytics' ); ?></span>
                                </div><!-- /.viewport-top -->
                                <div class="viewport-body">
                                    <canvas id="customer-sales-total-bar-chart"></canvas>
                                </div><!-- /.viewport-body -->
                            </div><!-- /.viewport-main -->

                            <div class="section-title">
                                <h2><?php esc_attr_e( 'Product Counts', 'cannabiz-analytics' ); ?></h2>
                            </div><!-- /.section-title -->

                            <div class="viewport-main three">
                                <div class="viewport-top">
                                    <div class="viewport-top-dot"></div>
                                    <div class="viewport-top-dot"></div>
                                    <div class="viewport-top-dot"></div>
                                    <span class="title"><?php esc_attr_e( 'Shelf Types', 'cannabiz-analytics' ); ?></span>
                                </div><!-- /.viewport-top -->
                                <div class="viewport-body">
                                    <canvas id="doughnut-chart"></canvas>
                                </div><!-- /.viewport-body -->
                            </div><!-- /.viewport-main.three -->

                            <div class="viewport-main three">
                                <div class="viewport-top">
                                    <div class="viewport-top-dot"></div>
                                    <div class="viewport-top-dot"></div>
                                    <div class="viewport-top-dot"></div>
                                    <span class="title"><?php esc_attr_e( 'Strain Types', 'cannabiz-analytics' ); ?></span>
                                </div><!-- /.viewport-top -->
                                <div class="viewport-body">
                                    <canvas id="doughnut-chart-2"></canvas>
                                </div><!-- /.viewport-body -->
                            </div><!-- /.viewport-main.three -->

                            <div class="viewport-main three">
                                <div class="viewport-top">
                                    <div class="viewport-top-dot"></div>
                                    <div class="viewport-top-dot"></div>
                                    <div class="viewport-top-dot"></div>
                                    <span class="title"><?php esc_attr_e( 'Product Types', 'cannabiz-analytics' ); ?></span>
                                </div><!-- /.viewport-top -->
                                <div class="viewport-body">
                                    <canvas id="doughnut-chart-3"></canvas>
                                </div><!-- /.viewport-body -->
                            </div><!-- /.viewport-main.three -->

                        </div><!-- .cannabiz-analytics-charts -->
                    </div><!-- .block-feature-wrap -->
                </div><!-- .panel-left -->

                <div class="footer-wrap">
                    <div class="footer">
                        <div class="footer-links">
                            <a href="https://cannabiz.pro/" target="_blank"><?php esc_html_e( 'CannaBiz Software, LLC', 'cannabiz-analytics' ); ?></a>
                            <a href="https://docs.cannabiz.pro/" target="_blank"><?php esc_html_e( 'Docs', 'cannabiz-analytics' ); ?></a>
                            <a href="https://twitter.com/gocannabiz" target="_blank"><?php esc_html_e( 'Twitter', 'cannabiz-analytics' ); ?></a>
                        </div>
                    </div>
                </div><!-- .footer-wrap -->
            </div><!-- .panel -->
        </div><!-- .panels -->
    </div><!-- .cannabiz-analytics -->
    <?php
}
