<?php
/**
 * @author  SoversLab
 * @since   1.0
 * @version 1.0
 */

namespace SoversLab\Untree;

class Custom_Widgets_Init {

	public $widgets;
	protected static $instance = null;

	public function __construct() {

		// Widgets -- filename=>classname /@dev
		$this->widgets	= array(
			'socials'	=> 'Socials_Widget',
			'contact'	=> 'Contact_Widget',
		);

		add_action( 'widgets_init', array( $this, 'custom_widgets' ) );
	}

	public static function instance() {
		if ( null == self::$instance ) {
			self::$instance = new self;
		}

		return self::$instance;
	}

	/**
	 * 'widgets_init' action hook callback
	 */
	public function custom_widgets() {
		foreach ( $this->widgets as $filename => $classname ) {
			// Widget file path
			$file  = dirname( __FILE__ ) . '/' . $filename . '.php';
			// Widget Name path or ClassName
			$class = __NAMESPACE__ . '\\' . $classname;

			// Widget file requires
			require_once $file;

			register_widget( $class );
		}
	}
}

Custom_Widgets_Init::instance();