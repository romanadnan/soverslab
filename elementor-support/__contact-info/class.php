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

class Contact_Info extends Custom_Widget_Base {

	public function __construct( $data = array(), $args = null ) {
		$this->soverslab_name = esc_html__( 'Contact Info', 'untree' );
		$this->soverslab_base = 'soverslabtheme-contact-info';
		parent::__construct( $data, $args );
	}

	public function soverslab_fields() {
		$fields = array(

			// General Section
			array(
				'mode'  => 'section_start',
				'id'    => 'sec_general',
				'label' => esc_html__( 'General', 'untree' ),
			),
			array(
				'type'        => Controls_Manager::TEXT,
				'id'          => 'heading',
				'label'       => esc_html__( 'Title', 'untree' ),
				'placeholder' => esc_html__( 'Contact Info', 'untree' ),
				'default'     => esc_html__( 'Contact Info', 'untree' ),

			),
			array(
				'type'        => Controls_Manager::TEXTAREA,
				'id'          => 'address',
				'label'       => esc_html__( 'Address', 'untree' ),
				'placeholder' => esc_html__( '43 Raymouth Rd. Baltemoer, London 3910.', 'untree' ),
				'default'     => esc_html__( '43 Raymouth Rd. Baltemoer, London 3910', 'untree' ),

			),
			array(
				'type'        => Controls_Manager::TEXT,
				'id'          => 'phone_1',
				'label'       => esc_html__( 'Phone 1', 'untree' ),
				'placeholder' => esc_html__( '+66 2 246 022', 'untree' ),
				'default'     => esc_html__( '+66 2 246 022', 'untree' ),

			),
			array(
				'type'        => Controls_Manager::TEXT,
				'id'          => 'phone_2',
				'label'       => esc_html__( 'Phone 2', 'untree' ),
				'placeholder' => esc_html__( '+66 2 246 000', 'untree' ),
				'default'     => esc_html__( '+66 2 246 000', 'untree' ),

			),
			array(
				'type'        => Controls_Manager::URL,
				'id'          => 'email',
				'label'       => esc_html__( 'Email Address', 'untree' ),
				'placeholder' => 'support@soverslab.com',
			),
			array(
				'type'        => Controls_Manager::URL,
				'id'          => 'website',
				'label'       => esc_html__( 'Website URL', 'untree' ),
				'placeholder' => 'https://your-link.com',
			),
			array(
				'mode' => 'section_end',
			),

			// Style Section
			array(
				'mode'  => 'section_start',
				'id'    => 'sec_color',
				'tab'   => Controls_Manager::TAB_STYLE,
				'label' => esc_html__( 'Color', 'untree' ),
			),
			array(
				'type'      => Controls_Manager::COLOR,
				'id'        => 'title_color',
				'label'     => esc_html__( 'Title', 'untree' ),
				'selectors' => array( '{{WRAPPER}} .card.theme-card .card-header.theme-card-header h2' => 'color: {{VALUE}}' ),
			),
			array(
				'type'      => Controls_Manager::COLOR,
				'id'        => 'content_color',
				'label'     => esc_html__( 'Content', 'untree' ),
				'selectors' => array( 
					'{{WRAPPER}} .theme-contact-info__content' => 'color: {{VALUE}}',
					'{{WRAPPER}} .theme-contact-info__list .theme-contact-info i' => 'color: {{VALUE}}',
				 ),
			),
			array(
				'type'      => Controls_Manager::COLOR,
				'id'        => 'content_hover_color',
				'label'     => esc_html__( 'Content Link Hover', 'untree' ),
				'selectors' => array( '{{WRAPPER}} a.theme-contact-info__content:hover' => 'color: {{VALUE}}' ),
			),
			array(
				'mode' => 'section_end',
			),

			// Typography Section
			array(
				'mode'  => 'section_start',
				'id'    => 'sec_typo',
				'tab'   => Controls_Manager::TAB_STYLE,
				'label' => esc_html__( 'Typography', 'untree' ),
			),
			array(
				'mode'     => 'group',
				'type'     => \Elementor\Group_Control_Typography::get_type(),
				'id'       => 'content_typo',
				'label'    => esc_html__( 'Content Typography', 'untree' ),
				'selector' => '{{WRAPPER}} .theme-contact-info__content, {{WRAPPER}} .theme-contact-info__list .theme-contact-info i',
			),
			array(
				'mode' => 'section_end',
			),
		);

		return $fields;
	}

	protected function render() {

		$data = $this->get_settings();

		$template = 'view';

		return $this->soverslab_template( $template, $data );
	}
}