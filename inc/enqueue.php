<?php
/**
 * @author  SoversLab
 * @since   1.0
 * @version 1.0
 */

namespace SoversLab\SoversLab;

class Enqueue {
    public $version;
	protected static $instance = null;

	public function __construct() {
		//$this->version = Constants::$theme_version;
		$this->version = "1.0.0";
		
		add_action( 'wp_enqueue_scripts', array( $this, 'register_scripts' ), 12 );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ), 15 );
	}

    public static function instance() {

		if ( null == self::$instance ) {
			self::$instance = new self;
		}

		return self::$instance;
	}

    public function register_scripts() {
		/*=========================
			Register CSS scripts
		==========================*/
		// Font-Awesome
		wp_register_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css' );

		// Bootstrap
		wp_register_style( 'bootstrap', Helper::get_vendor_assets( 'bootstrap/css/bootstrap.min.css' ), array(), $this->version );
		//wp_register_style( 'bootstrap-login-register', Helper::get_vendor_assets( 'bootstrap/css/bootstrap-login-register.css' ), array(), $this->version );
		// Bootstrap
		wp_register_style( 'jquery-fancybox', Helper::get_vendor_assets( 'other/css/jquery.fancybox.min.css' ), array(), $this->version );
		// Login Register
		//wp_register_style( 'login-register', Helper::get_vendor_assets( 'other/css/login-register.css' ), array(), $this->version );
		// AOS
		wp_register_style( 'aos-style', Helper::get_vendor_assets( 'aos/css/aos.css' ), array(), $this->version );
		// Owl Theme Default
		wp_register_style( 'owl-theme-default', Helper::get_vendor_assets( 'owl-carousel/css/owl.theme.default.min.css' ), array(), $this->version );
		// Owl Carousel
		wp_register_style( 'owl-carousel', Helper::get_vendor_assets( 'owl-carousel/css/owl.carousel.min.css' ), array(), $this->version );
		// Theme main CSS
		wp_register_style( 'untree-style', Helper::get_css( 'main' ), array(), $this->version );
		

		/*=======================
			Register JS scripts
		========================*/

		// Bootstrap
		wp_register_script( 'bootstrap', Helper::get_vendor_assets( 'bootstrap/js/bootstrap.min.js' ), array( 'jquery' ), $this->version, true );
		//wp_register_script( 'bootstrap-login-register', Helper::get_vendor_assets( 'bootstrap/js/bootstrap-login-register.js' ), array( 'jquery' ), $this->version, true );
		// jquery-1.10.2
		//wp_register_script( 'jquery-1-10-2', Helper::get_vendor_assets( 'other/js/jquery-1.10.2.js' ), array(  ), $this->version, true );
		// Jquery Animate Number
		wp_register_script( 'jquery-animateNumber', Helper::get_vendor_assets( 'other/js/jquery.animateNumber.min.js' ), array( 'jquery' ), $this->version, true );
		// Jquery Easing
		wp_register_script( 'jquery-easing', Helper::get_vendor_assets( 'other/js/jquery.easing.1.3.js' ), array( 'jquery' ), $this->version, true );
		// Jquery Fancybox
		wp_register_script( 'jquery-fancybox', Helper::get_vendor_assets( 'other/js/jquery.fancybox.min.js' ), array( 'jquery' ), $this->version, true );
		// Jquery Waypoints
		wp_register_script( 'jquery-waypoints', Helper::get_vendor_assets( 'other/js/jquery.waypoints.min.js' ), array( 'jquery' ), $this->version, true );
		// Popper
		wp_register_script( 'jquery-popper', Helper::get_vendor_assets( 'other/js/popper.min.js' ), array( 'jquery' ), $this->version, true );
		// Jarallax
		wp_register_script( 'jarallax', Helper::get_vendor_assets( 'other/js/jarallax.min.js' ), array( 'jquery' ), $this->version, true );
		// Login Register
		//wp_register_script( 'login-register', Helper::get_vendor_assets( 'other/js/login-register.js' ), array( 'jquery' ), $this->version );
		// AOS
		wp_register_script( 'aos-js', Helper::get_vendor_assets( 'aos/js/aos.js' ), array( 'jquery' ), $this->version );
		// Owl Carousel
		wp_register_script( 'owl-carousel', Helper::get_vendor_assets( 'owl-carousel/js/owl.carousel.min.js' ), array( 'jquery' ), $this->version );
		
		// Theme main JS
		wp_register_script( 'untree-js', Helper::get_js( 'main' ), array( 'jquery' ), $this->version );		
	}

    public function enqueue_scripts() {
		/*=======================
			Enqueued CSS scripts
		========================*/

		// Font-Awesome
		wp_enqueue_style('font-awesome');

		// Bootstrap
		wp_enqueue_style( 'bootstrap' );
		//wp_enqueue_style( 'bootstrap-login-register' );
		// Aos style
		wp_enqueue_style( 'aos-style' );
		// Login Register
		//wp_enqueue_style( 'login-register' );
		// Bootstrap
		wp_enqueue_style( 'owl-theme-default' );
		// Owl Carousel CSS
		wp_enqueue_style( 'owl-carousel' );
		// Jquery Fancybox CSS
		wp_enqueue_style( 'jquery-fancybox' );
		// Theme main CSS
		wp_enqueue_style( 'untree-style' );
		
		/*=======================
			Enqueued JS scripts
		========================*/

		// Jquery
		wp_enqueue_script( 'jquery' );
		// Bootstrap JS
		wp_enqueue_script( 'bootstrap' );
		// bootstrap-login-register JS
		//wp_enqueue_script( 'bootstrap-login-register' );
		// Jquery
		//wp_enqueue_script( 'jquery-1-10-2' );
		// Jquery AnimateNumber
		wp_enqueue_script( 'jquery-animateNumber' );
		// Jquery Easing
		wp_enqueue_script( 'jquery-easing' );
		// Jquery Fancybox
		wp_enqueue_script( 'jquery-fancybox' );
		// Jquery Waypoints
		wp_enqueue_script( 'jquery-waypoints' );
		// Jquery Popper
		wp_enqueue_script( 'jquery-popper' );
		// Jarallax
		wp_enqueue_script( 'jarallax' );
		// Jarallax
		//wp_enqueue_script( 'login-register' );
		// Aos JS
		wp_enqueue_script( 'aos-js' );
		// Owl Carousel JS
		wp_enqueue_script( 'owl-carousel' );
		// Theme main JS
		wp_enqueue_script( 'untree-js' );
	}
}

Enqueue::instance();