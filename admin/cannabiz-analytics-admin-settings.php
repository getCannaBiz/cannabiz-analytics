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
 * Adds a menu item for the Analytics page.
 *
 * since 1.0.0
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
 * since 1.0.0
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
					<div class="block-split clearfix">
						<div class="block-split-left">
							<div class="titles">
								<h2><?php esc_html_e( 'Welcome to the future of cannabis website design with WP Dispensary\'s Product Blocks for Gutenberg!', 'cannabiz-analytics' ); ?></h2>
								<p><?php esc_html_e( 'The Dispensary Blocks collection makes it a breeze to add and style your menu. Simply search for "dispensary" or "products" in the block inserter to display Dispensary Blocks.', 'cannabiz-analytics' ); ?></p>
							</div>
						</div>
						<div class="block-split-right">
							<div class="block-theme">
								<img src="<?php echo esc_url( plugins_url( 'images/theme.jpg', __FILE__ ) ) ?>" alt="<?php esc_html_e( 'CannaBiz Analytics', 'cannabiz-analytics' ); ?>" />
							</div>
						</div>
					</div>

					<div class="block-feature-wrap clear">
						<div class="cannabiz-analytics-charts">

                            <div class="viewport-main two">
                                <div class="viewport-top">
                                    <div class="viewport-top-dot"></div>
                                    <div class="viewport-top-dot"></div>
                                    <div class="viewport-top-dot"></div>
                                </div><!-- /.viewport-top -->
                                <div class="viewport-body">
                                    <canvas id="pie-chart"></canvas>
                                </div><!-- /.viewport-body -->
                            </div><!-- /.viewport-main.two -->

                            <div class="viewport-main two">
                                <div class="viewport-top">
                                    <div class="viewport-top-dot"></div>
                                    <div class="viewport-top-dot"></div>
                                    <div class="viewport-top-dot"></div>
                                </div><!-- /.viewport-top -->
                                <div class="viewport-body">
                                    <canvas id="pie-chart-2"></canvas>
                                </div><!-- /.viewport-body -->
                            </div><!-- /.viewport-main.two -->

                            <div class="viewport-main">
                                <div class="viewport-top">
                                    <div class="viewport-top-dot"></div>
                                    <div class="viewport-top-dot"></div>
                                    <div class="viewport-top-dot"></div>
                                </div><!-- /.viewport-top -->
                                <div class="viewport-body">
                                    <canvas id="bar-chart"></canvas>
                                </div><!-- /.viewport-body -->
                            </div><!-- /.viewport-main -->

                            <div class="viewport-main three">
                                <div class="viewport-top">
                                    <div class="viewport-top-dot"></div>
                                    <div class="viewport-top-dot"></div>
                                    <div class="viewport-top-dot"></div>
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
							<a href="https://www.wpdispensary.com/"><?php esc_html_e( 'WP Dispensary', 'cannabiz-analytics' ); ?></a>
							<a href="https://www.wpdispensary.com/blog/"><?php esc_html_e( 'Blog', 'cannabiz-analytics' ); ?></a>
							<a href="https://www.wpdispensary.com/documentation/"><?php esc_html_e( 'Docs', 'cannabiz-analytics' ); ?></a>
							<a href="https://twitter.com/wpdispensary"><?php esc_html_e( 'Twitter', 'cannabiz-analytics' ); ?></a>
						</div>
					</div>
				</div><!-- .footer-wrap -->
			</div><!-- .panel -->
		</div><!-- .panels -->
	</div><!-- .cannabiz-analytics -->
<?php
}
