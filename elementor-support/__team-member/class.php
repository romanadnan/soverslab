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

class Team_Member extends Custom_Widget_Base {

	public function __construct( $data = array(), $args = null ) {
		$this->soverslab_name = __( 'Team Member', 'untree' );
		$this->soverslab_base = 'soverslabtheme-team-member';
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
				'type'      => \Elementor\Controls_Manager::MEDIA,
				'id'        => 'image',
				'label'     => esc_html__( 'Choose Image', 'untree' ),
				'default'   => [ 'url' => get_template_directory_uri() . '/assets/img/team_member.jpg' ]
			),
			array(
				'type'      => \Elementor\Controls_Manager::TEXT,
				'id'        => 'name',
				'label'     => __( 'Name', 'untree' ),
				'default'   => __( 'Jhon Mac', 'untree' ),
			),
			array(
				'type'      => \Elementor\Controls_Manager::TEXT,
				'id'        => 'designation',
				'label'     => __( 'Designation', 'untree' ),
				'default'   => __( 'CEO', 'untree' ),
			),			
			array(
				'type'      => \Elementor\Controls_Manager::TEXTAREA,
				'id'        => 'about_team_member',
				'label'     => __( 'About Member', 'untree' ),
				'default'   => esc_html__( 'Type here about the team member', 'untree' ),
			),
			array(
				'mode' => 'section_end',
			),

			// Color Section
			array(
				'mode'  => 'section_start',
				'id'    => 'sec_color',
				'tab'   => Controls_Manager::TAB_STYLE,
				'label' => __( 'Color', 'untree' ),
			),
			array(
				'type'      => Controls_Manager::COLOR,
				'id'        => 'title_color',
				'label'     => __( 'Title', 'untree' ),
				'default'   => '#111111',
				'selectors' => array( '{{WRAPPER}} .theme-blog-card__title a' => 'color: {{VALUE}}' ),
			),
			array(
				'type'      => Controls_Manager::COLOR,
				'id'        => 'excpert_color',
				'label'     => __( 'Excerpt', 'untree' ),
				'default'   => '#444444',
				'selectors' => array( '{{WRAPPER}} .theme-blog-card__summary' => 'color: {{VALUE}}' ),
			),
			array(
				'mode' => 'section_end',
			),

			// Typography Section
			array(
				'mode'  => 'section_start',
				'id'    => 'sec_typo',
				'tab'   => Controls_Manager::TAB_STYLE,
				'label' => __( 'Typography', 'untree' ),
			),
			array(
				'mode'     => 'group',
				'type'     => \Elementor\Group_Control_Typography::get_type(),
				'id'       => 'title_typo',
				'label'    => __( 'Title', 'untree' ),
				'selector' => '{{WRAPPER}} .theme-blog-card__title',
			),
			array(
				'mode'     => 'group',
				'type'     => \Elementor\Group_Control_Typography::get_type(),
				'id'       => 'excpert_typo',
				'label'    => __( 'Excerpt', 'untree' ),
				'selector' => '{{WRAPPER}} .theme-blog-card__summary',
			),
			array(
				'mode' => 'section_end',
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