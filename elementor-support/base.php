<?php
/**
 * @author  SoversLab
 * @since   1.0
 * @version 1.0
 */

namespace SoversLab\Theme\Elementor;

use Elementor\Widget_Base;
use \ReflectionClass;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
// Exit if accessed directly

class Custom_Widget_Base extends Widget_Base {

	public $soverslab_prefix = 'untree'; // change category prefix here /@dev

	public $soverslab_dir;
	public $soverslab_name;
	public $soverslab_base;
	public $soverslab_icon;
	public $soverslab_category;
	public $soverslab_translate;

	public function __construct( $data = array(), $args = null ) {
		$this->soverslab_category = $this->soverslab_prefix . '-widgets';
		$this->soverslab_icon     = 'soverslabtheme-el-custom';
		$this->soverslab_dir      = dirname(  ( new ReflectionClass( $this ) )->getFileName() );
		parent::__construct( $data, $args );
	}

	public function get_name() {
		return $this->soverslab_base;
	}

	public function get_title() {
		return $this->soverslab_name;
	}

	public function get_icon() {
		return $this->soverslab_icon;
	}

	public function get_categories() {
		return array( $this->soverslab_category );
	}

	// Either Override soverslab_fields() or the default _register_controls()
	protected function soverslab_fields() {
		return array();
	}

	public function soverslab_run_shortcode( $shortcode, $atts = [] ) {
		$html = '';

		foreach ( $atts as $key => $value ) {
			$html .= sprintf( ' %s="%s"', $key, esc_html( $value ) );
		}

		$html = sprintf( '[%s%s]', $shortcode, $html );

		echo do_shortcode( $html );
	}

	protected function register_controls() {
		$fields = $this->soverslab_fields();

		foreach ( $fields as $field ) {

			if ( isset( $field['mode'] ) && $field['mode'] == 'section_start' ) {
				$id = $field['id'];
				unset( $field['id'] );
				unset( $field['mode'] );
				$this->start_controls_section( $id, $field );

			} elseif ( isset( $field['mode'] ) && $field['mode'] == 'section_end' ) {
				$this->end_controls_section();

			} elseif ( isset( $field['mode'] ) && $field['mode'] == 'tabs_start' ) {
				$id = $field['id'];
				unset( $field['id'] );
				unset( $field['mode'] );
				$this->start_controls_tabs( $id );

			} elseif ( isset( $field['mode'] ) && $field['mode'] == 'tabs_end' ) {
				$this->end_controls_tabs();

			} elseif ( isset( $field['mode'] ) && $field['mode'] == 'tab_start' ) {
				$id = $field['id'];
				unset( $field['id'] );
				unset( $field['mode'] );
				$this->start_controls_tab( $id, $field );

			} elseif ( isset( $field['mode'] ) && $field['mode'] == 'tab_end' ) {
				$this->end_controls_tab();

			} elseif ( isset( $field['mode'] ) && $field['mode'] == 'group' ) {
				$type          = $field['type'];
				$field['name'] = $field['id'];
				unset( $field['mode'] );
				unset( $field['type'] );
				unset( $field['id'] );
				$this->add_group_control( $type, $field );

			} elseif ( isset( $field['mode'] ) && $field['mode'] == 'responsive' ) {
				$id = $field['id'];
				unset( $field['id'] );
				unset( $field['mode'] );
				$this->add_responsive_control( $id, $field );
				
			} else {
				$id = $field['id'];
				unset( $field['id'] );
				$this->add_control( $id, $field );
			}
		}
	}

	public function soverslab_template( $template, $data ) {
		$template_name = '/elementor-support/' . basename( $this->soverslab_dir ) . '/' . $template . '.php';
		
		if ( file_exists( get_stylesheet_directory() . $template_name ) ) {
			$file = get_stylesheet_directory() . $template_name;
		} elseif ( file_exists( get_template_directory() . $template_name ) ) {
			$file = get_template_directory() . $template_name;
		} else {
			$file = $this->soverslab_dir . '/' . $template . '.php';
		}

		ob_start();
		include $file;
		echo ob_get_clean();
	}
}