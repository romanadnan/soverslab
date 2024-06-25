<?php
/**
 * @author  SoversLab
 * @since   1.0
 * @version 1.0
 */

namespace SoversLab\Theme\Elementor;

use Elementor\Plugin;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
// Exit if accessed directly

class Widget_Init {

	public $prefix;
	public $category;
	public $widgets;

	public function __construct() {
		$this->init();
		add_action( 'elementor/editor/after_enqueue_styles',	array( $this, 'editor_style' ) );
		add_action( 'elementor/elements/categories_registered', array( $this, 'widget_categoty' ) );
		add_action( 'elementor/widgets/register',				array( $this, 'register_widgets' ) );
	}

	private function init() {
		$this->prefix   = 'untree';
		$this->category = __( 'Theme Elements', 'untree' );

		// Widgets -- dirname=>classname
		$this->widgets = array(
			//'title'        => 'Title',
			'post'         => 'Post',
			// 'team-member'  => 'Team_Member',
			// 'contact-info' => 'Contact_Info',
			//'test' => 'Test',
		);
	}

	public function editor_style() {
		$img = get_stylesheet_directory_uri() . '/elementor-support/soverslab-icon.png';
		wp_add_inline_style( 'elementor-editor', '.elementor-control-type-select2 .elementor-control-input-wrapper {min-width: 130px;}.elementor-element .icon .soverslabtheme-el-custom{content: url(' . $img . ');width: 22px;}' );
	}

	public function widget_categoty( $class ) {
		$id         = $this->prefix . '-widgets';
		$properties = array(
			'title' => $this->category,
		);

		Plugin::$instance->elements_manager->add_category( $id, $properties );
	}

	public function register_widgets() {
		require_once __DIR__ . '/base.php';

		foreach ( $this->widgets as $dirname => $class ) {
			$template_name = '/elementor-support/' . $dirname . '/class.php';

			if ( file_exists( get_stylesheet_directory() . $template_name ) ) {
				$file = get_stylesheet_directory() . $template_name;
			} elseif ( file_exists( get_template_directory() . $template_name ) ) {
				$file = get_template_directory() . $template_name;
			} else {
				$file = __DIR__ . '/' . $dirname . '/class.php';
			}

			// Include Widget files
			require_once $file;

			// Register widget
			$classname = __NAMESPACE__ . '\\' . $class;
			Plugin::instance()->widgets_manager->register( new $classname );
		}
	}
}

new Widget_Init();