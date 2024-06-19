<?php
/**
 * @author  SoversLab
 * @since   1.0
 * @version 1.0
 */

namespace SoversLab\SoversLab;

class Helper {

	public static function get_template_part( $template, $args = array() ) {		
		if ( is_array( $args ) ) {
			extract( $args );
		}

		$template = '/' . $template . '.php';

		if ( file_exists( get_stylesheet_directory() . $template ) ) {
			$file = get_stylesheet_directory() . $template;
		} else {
			$file = get_template_directory() . $template;
		}

		require $file;
	}

	public static function get_template_content( $template ) {
		ob_start();
		get_template_part( $template );

		return ob_get_clean();
	}

	private static function get_file_path( $filename, $dir = false ) {
		if ( $dir ) {
			$child_file = get_stylesheet_directory() . '/' . $dir . '/' . $filename;

			if ( file_exists( $child_file ) ) {
				$file = $child_file;
			} else {
				$file = get_template_directory() . '/' . $dir . '/' . $filename;
			}
		} else {			
			$file = get_template_directory() . '/inc/' . $filename;			
		}

		return $file;
	}

    public static function requires( $filename, $dir = false ) {
		require_once self::get_file_path( $filename, $dir );
	}

	public static function includes( $filename, $dir = false ) {
		include self::get_file_path( $filename, $dir );
	}

    private static function get_file_uri( $path ) {
		$filepath = get_stylesheet_directory() . $path;
		$file     = get_stylesheet_directory_uri() . $path;

		if ( ! file_exists( $filepath ) ) {
			$file = get_template_directory_uri() . $path;
		}

		return $file;
	}

	public static function get_img( $filename ) {
		$path = '/assets/img/' . $filename;

		return self::get_file_uri( $path );
	}

	public static function get_css( $filename ) {
		$path = '/assets/css/' . $filename . '.css';

		return self::get_file_uri( $path );
	}

	public static function get_js( $filename ) {
		$path = '/assets/js/' . $filename . '.js';

		return self::get_file_uri( $path );
	}

	public static function get_vendor_assets( $file ) {
		$path = '/assets/vendors/' . $file;

		return self::get_file_uri( $path );
	}

	public static function get_svg_icon( $filename ) {
		$dir      = 'assets/icons';
		$filename = $filename . '.svg';
		$file     = self::get_file_path( $filename, $dir );
		$svg      = file_get_contents( $file );
		$svg      = trim( $svg );

		return $svg;
	}

	public static function get_reading_time( $content, $tag ) {
		$stripped_content = strip_tags( $content );
		$total_word       = str_word_count( $stripped_content );
		$reading_minute   = floor( $total_word / 200 );
		$reading_seconds  = floor( $total_word % 200 / ( 200 / 60 ) );

		if ( ! $reading_minute ) {
			$reading_time = $reading_seconds;
			$unit_name    = __( 'secs', 'onelisting' );
		} else {
			$reading_time = $reading_minute;
			$unit_name    = __( 'mins', 'onelisting' );
		}

		$reading_time_html = sprintf( '<%s>%s %s %s </%s>', $tag, $reading_time, $unit_name, __( 'read', 'onelisting' ), $tag );

		return $reading_time_html;
	}

	public static function get_paginate_links() {
		$args = array(
			'prev_text' => Helper::get_svg_icon( 'long-arrow-alt-left-solid' ),
			'next_text' => Helper::get_svg_icon( 'long-arrow-alt-right-solid'),
		);

		return paginate_links( $args );
	}
}