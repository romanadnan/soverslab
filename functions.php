<?php
/**
 * @author  SoversLab
 * @since   1.0
 * @version 1.0
 */

namespace SoversLab\SoversLab;


class SoversLab_Main {

 	public $theme = 'soverslab';

	public function __construct() {
		add_action( 'after_setup_theme', array( $this, 'load_textdomain' ) );
		$this->includes();
	}

	public function load_textdomain() {
		load_theme_textdomain( $this->theme, get_template_directory() . '/languages' );
	}

 	public function includes() {
// 		require_once get_template_directory() . '/inc/constants.php';
// 		require_once get_template_directory() . '/inc/traits/init.php';
 		require_once get_template_directory() . '/inc/helper.php';
// 		require_once get_template_directory() . '/inc/theme.php';
 		require_once get_template_directory() . '/inc/general.php';
 		require_once get_template_directory() . '/inc/enqueue.php';
 		require_once get_template_directory() . '/widgets/init.php';
 		require_once get_template_directory() . '/elementor-support/init.php';
 	}
}

new SoversLab_Main;


/**
 * Initialize Elementor Widget
 */
/*class Elementor_Custom_Element {
	private static $instance = null;

	public static function get_instance() {
		if ( !self::$instance ) {
			self::$instance = new self;
			return self::$instance;
		}
	}

	public function init() {
		add_action( 'elementor/widgets/widgets_registered', array( $this, 'widgets_registered' ) );
	}

	public function widgets_registered() {

		//We check if the Elementor plugin has been installed / activated.
		if ( defined( 'ELEMENTOR_PATH' ) && class_exists( 'Elementor\widget_Base' ) ) {

			// We look for any theme overides for this custom elementor element.
			// if no theme overrides are found we use the default one in this plugin.
			$widget_file = get_template_directory() . '/lib/create-widget.php';
			$template_file = locate_template( $widget_file );

			if ( !$template_file || !is_readable( $template_file ) ) {
				$template_file = get_template_directory() . '/lib/create-widget.php';
			}
			if ( $template_file && is_readable( $template_file ) ) {
				require_once $template_file;
			}
		}
	}
}

Elementor_Custom_Element::get_instance()->init();*/
