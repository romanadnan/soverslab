<?php
/**
 * @author  SoversLab
 * @since   1.0
 * @version 1.0
 */

namespace SoversLab\Theme\Elementor;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Title extends Custom_Widget_Base {

	public function __construct( $data = array(), $args = null ) {
		$this->soverslab_name = __( 'Section Title', 'untree' );
		$this->soverslab_base = 'soverslabtheme-title';
		parent::__construct( $data, $args );
	}

	public function soverslab_fields() {
		$fields = array(

			// General Section
			array(
				'mode'  => 'section_start',
				'id'    => 'sec_general',
				'label' => __( 'General', 'untree' ),
			),
			array(
				'type'    => Controls_Manager::TEXTAREA,
				'id'      => 'title',
				'label'   => __( 'Title', 'untree' ),
				'default' => __( 'This is the heading', 'untree' ),
			),
			array(
				'type'    => Controls_Manager::TEXTAREA,
				'id'      => 'subtitle',
				'label'   => __( 'Subtitle', 'untree' ),
				'default' => __( 'Standard daand scrambled rimply dummy text of the printing and typesetting industry', 'untree' ),
			),
			array(
				'type'      => Controls_Manager::CHOOSE,
				'id'        => 'content_alginment',
				'label'     => __( 'Alignment', 'untree' ),
				'options'   => array(
					'left'   => array(
						'title' => __( 'Left', 'untree' ),
						'icon'  => 'eicon-text-align-left',
					),
					'center' => array(
						'title' => __( 'Center', 'untree' ),
						'icon'  => 'eicon-text-align-center',
					),
					'right'  => array(
						'title' => __( 'Right', 'untree' ),
						'icon'  => 'eicon-text-align-right',
					),
				),
				'default'   => 'center',
				'toggle'    => true,
				'selectors' => array( '{{WRAPPER}} .theme-section-title' => 'text-align: {{VALUE}}' ),
			),
			array(
				'mode' => 'section_end',
			),

			// Color Section
			array(
				'mode'  => 'section_start',
				'id'    => 'sec_style',
				'tab'   => Controls_Manager::TAB_STYLE,
				'label' => __( 'Color', 'untree' ),
			),
			array(
				'type'      => Controls_Manager::COLOR,
				'id'        => 'title_color',
				'label'     => __( 'Title', 'untree' ),
				'default'   => '#111111',
				'selectors' => array( '{{WRAPPER}} .theme-section-title__title' => 'color: {{VALUE}}' ),
			),
			array(
				'type'      => Controls_Manager::COLOR,
				'id'        => 'subtitle_color',
				'label'     => __( 'Subtitle', 'untree' ),
				'default'   => '#444444',
				'selectors' => array( '{{WRAPPER}} .theme-section-title__subtitle' => 'color: {{VALUE}}' ),
			),
			array(
				'mode' => 'section_end',
			),

			// Typography Section
			array(
				'mode'  => 'section_start',
				'id'    => 'sec_style_type',
				'tab'   => Controls_Manager::TAB_STYLE,
				'label' => __( 'Typography', 'untree' ),
			),
			array(
				'mode'     => 'group',
				'type'     => \Elementor\Group_Control_Typography::get_type(),
				'id'       => 'title_typo',
				'label'    => __( 'Title', 'untree' ),
				'selector' => '{{WRAPPER}} .theme-section-title__title',
			),
			array(
				'mode'     => 'group',
				'type'     => \Elementor\Group_Control_Typography::get_type(),
				'id'       => 'subtitle_typo',
				'label'    => __( 'Subtitle', 'untree' ),
				'selector' => '{{WRAPPER}} .theme-section-title__subtitle',
			),
			array(
				'mode'		=> 'section_end',
			),
		);

		return $fields;
	}

	protected function render() {
		$data		= $this->get_settings();
		$template	= 'view';

		return $this->soverslab_template( $template, $data );
	}
}