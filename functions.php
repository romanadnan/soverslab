<?php
/**
 * @author  SoversLab
 * @since   1.0
 * @version 1.0
 */

namespace SoversLab\SoversLab;


class SoversLab_Main {

 	public $theme = 'untree';

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




