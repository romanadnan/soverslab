<?php
namespace Elementor;

class First_Widget extends Widget_Base{
	public function get_name() {
		return "first-widget";
	}
	public function get_title() {
		return "My First Widget";
	}
	public function get_icon() {
		return "eicon-slider-full-screen";
	}
	public function get_categories() {
		return ["basic"];
	}

	protected function _register_controls(){
		$this->start_controls_section(
			'section-one',
			[
				'label' => esc_html__( 'Content-1', 'soverslab' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'section-one-title',
			[
				'type' => Controls_Manager::TEXT,
				'label' => esc_html__( 'Title', 'soverslab' ),
				'placeholder' => esc_html__( 'Enter your title', 'soverslab' ),
			]
		);
		$this->add_control(
			'section-one-select',
			[
				'type' => Controls_Manager::SELECT,
				'label' => esc_html__( 'Do you know OOP', 'soverslab' ),
				'placeholder' => esc_html__( 'Enter your title', 'soverslab' ),
				'options' => [
					'yes' => __( 'Yes', 'soverslab' ),
					'no' => __( 'No', 'soverslab' ),
				],
				'default' => 'yes',
			]
		);
		$this->add_control(
			'alignment',
			[
				'type' => Controls_Manager::CHOOSE,
				'label' => esc_html__( 'Alignment', 'soverslab' ),
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'soverslab' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'soverslab' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'soverslab' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'center',
			]
		);
		
		$this->end_controls_section();

		$this->start_controls_section(
			'section-two',
			[
				'label' => esc_html__( 'Content-2', 'soverslab' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'section-three',
			[
				'label' => esc_html__( 'Content-3', 'soverslab' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->end_controls_section();
	}
}
Plugin::instance()->widgets_manager->register( new First_Widget() );