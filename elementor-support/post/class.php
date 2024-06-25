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

class Post extends Custom_Widget_Base {

	public function __construct( $data = array(), $args = null ) {
		$this->soverslab_name = __( 'Post', 'untree' );
		$this->soverslab_base = 'soverslabtheme-post';
		parent::__construct( $data, $args );
	}

	private function soverslab_query( $data ) {
		$args = array(
			'cat'                 => (int) $data['cat'],
			'orderby'             => $data['orderby'],
			'posts_per_page'      => $data['number_of_post'],
			'post_status'         => 'publish',
			'suppress_filters'    => false,
			'ignore_sticky_posts' => true,
		);

		switch ( $data['orderby'] ) {
			case 'title':
			case 'menu_order':
				$args['order'] = 'ASC';
				break;
		}

		return new \WP_Query( $args );
	}

	public function soverslab_fields() {

		$categories        = get_categories();
		$category_dropdown = array( '0' => __( 'All Categories', 'untree' ) );

		foreach ( $categories as $category ) {
			$category_dropdown[$category->term_id] = $category->name;
		}

		$fields = array(

			// General Section
			array(
				'mode'  => 'section_start',
				'id'    => 'sec_general',
				'label' => __( 'General', 'untree' ),
			),
			array(
				'type'    => Controls_Manager::NUMBER,
				'id'      => 'number_of_post',
				'label'   => __( 'Number of Posts', 'untree' ),
				'default' => 3,
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'number_of_columns',
				'label'   => __( 'Columns', 'untree' ),
				'options' => array(
					'2' => __( '6 Columns', 'untree' ),
					'3' => __( '4 Columns', 'untree' ),
					'4' => __( '3 Columns', 'untree' ),
					'6' => __( '2 Columns', 'untree' ),
				),
				'default' => 4,

			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'cat',
				'label'   => __( 'Categories', 'untree' ),
				'options' => $category_dropdown,
				'default' => '0',
			),
			array(
				'type'    => Controls_Manager::SELECT2,
				'id'      => 'orderby',
				'label'   => __( 'Order By', 'untree' ),
				'options' => array(
					'date'       => __( 'Date (Recents comes first)', 'untree' ),
					'title'      => __( 'Title', 'untree' ),
					'menu_order' => __( 'Custom Order (Available via Order field inside Page Attributes box)', 'untree' ),
				),
				'default' => 'date',
			),
			array(
				'type'      => \Elementor\Controls_Manager::SWITCHER,
				'id'        => 'show_post_avater',
				'label'     => __( 'Show Post Avater', 'untree' ),
				'label_on'  => __( 'Show', 'untree' ),
				'label_off' => __( 'Hide', 'untree' ),
				'default'   => 'yes',
			),
			array(
				'type'      => \Elementor\Controls_Manager::SWITCHER,
				'id'        => 'show_post_author_name',
				'label'     => __( 'Show Post Author Name', 'untree' ),
				'label_on'  => __( 'Show', 'untree' ),
				'label_off' => __( 'Hide', 'untree' ),
				'default'   => 'yes',
			),
			array(
				'type'      => \Elementor\Controls_Manager::SWITCHER,
				'id'        => 'show_excpert',
				'label'     => __( 'Show Excerpt', 'untree' ),
				'label_on'  => __( 'Show', 'untree' ),
				'label_off' => __( 'Hide', 'untree' ),
				'default'   => 'yes',
			),
			array(
				'type'      => \Elementor\Controls_Manager::SWITCHER,
				'id'        => 'show_date',
				'label'     => __( 'Show Date', 'untree' ),
				'label_on'  => __( 'Show', 'untree' ),
				'label_off' => __( 'Hide', 'untree' ),
				'default'   => 'yes',
			),
			array(
				'type'      => \Elementor\Controls_Manager::SWITCHER,
				'id'        => 'show_reading_time',
				'label'     => __( 'Show Reading Time', 'untree' ),
				'label_on'  => __( 'Show', 'untree' ),
				'label_off' => __( 'Hide', 'untree' ),
				'default'   => 'yes',
			),
			array(
				'type'      => \Elementor\Controls_Manager::SWITCHER,
				'id'        => 'show_category',
				'label'     => __( 'Show Categories', 'untree' ),
				'label_on'  => __( 'Show', 'untree' ),
				'label_off' => __( 'Hide', 'untree' ),
				'default'   => 'yes',
			),
			array(
				'type'      => \Elementor\Controls_Manager::SWITCHER,
				'id'        => 'show_more_button',
				'label'     => __( 'Show More Button', 'untree' ),
				'label_on'  => __( 'Show', 'untree' ),
				'label_off' => __( 'Hide', 'untree' ),
				'default'   => 'yes',
			),
			array(
				'type'      => \Elementor\Controls_Manager::TEXT,
				'id'        => 'show_more_button_text',
				'label'     => __( 'Button Text', 'untree' ),
				'default'   => esc_html__( 'See all the guides', 'untree' ),
				'condition' => array( 'show_more_button' => array( 'yes' ) ),
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
		$data = $this->get_settings();

		$data['query'] = $this->soverslab_query( $data );

		$template = 'view'; 

		return $this->soverslab_template( $template, $data );
	}
}