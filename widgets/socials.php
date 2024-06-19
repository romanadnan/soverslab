<?php
/**
 * @author  SoversLab
 * @since   1.0
 * @version 1.0
 */

namespace SoversLab\Untree;

use SoversLab\Untree\Helper;

class Socials_Widget extends \WP_Widget {
	
	public function __construct() {
		$id = 'untree_author_socials_info';
		parent::__construct(
            $id, // Base ID
            esc_html__( 'Untree: Socials', 'untree' ), // Name
            array( 
				'description' => esc_html__( 'Untrrr: Author socials info link.', 'untree' ),
			)
		);
	}

	/**
	 * Widget output show in frontend
	 */
	public function widget( $args, $instance ) {
		echo wp_kses_post( $args['before_widget'] );

		if ( ! empty( $instance['title'] ) ) {
			printf( '%s %s %s', wp_kses_post( $args['before_title'] ) , esc_html( $instance['title'] ), wp_kses_post( $args['after_title'] ) );
		}
		?>
		<ul class="list-unstyled social">		
			<?php
			if ( ! empty( $instance['facebook'] ) ) {
				?>
				<li>
					<a class="facebook" href="<?php echo esc_url( $instance['facebook'] ); ?>" target="_blank"><?php echo Helper::get_svg_icon( 'facebook-square' ); ?></a>
				</li>
				<?php
			}
			if ( ! empty( $instance['twitter'] ) ) {
				?>
				<li>
					<a class="twitter" href="<?php echo esc_url( $instance['twitter'] ); ?>" target="_blank"><?php echo Helper::get_svg_icon( 'twitter' ); ?></a>
				</li>
				<?php
			}
			if ( ! empty( $instance['linkedin'] ) ) {
				?>
				<li>
					<a class="linkedin" href="<?php echo esc_url( $instance['linkedin'] ); ?>" target="_blank"><?php echo Helper::get_svg_icon( 'linkedin-in' ); ?></a>
				</li>
				<?php
			}
			if ( ! empty( $instance['pinterest'] ) ) {
				?>
				<li>
					<a class="pinterest" href="<?php echo esc_url( $instance['pinterest'] ); ?>" target="_blank"><?php echo Helper::get_svg_icon( 'pinterest' ); ?></a>
				</li>
				<?php
			}
			if ( ! empty( $instance['instagram'] ) ) {
				?>
				<li>
					<a class="instagram" href="<?php echo esc_url( $instance['instagram'] ); ?>" target="_blank"><?php echo Helper::get_svg_icon( 'instagram' ); ?></a>
				</li>
				<?php
			}
			if ( ! empty( $instance['github'] ) ) {
				?>
				<li>
					<a class="github" href="<?php echo esc_url( $instance['github'] ); ?>" target="_blank"><?php echo Helper::get_svg_icon( 'github' ); ?></a>
				</li>
				<?php
			}
			if ( ! empty( $instance['wordpress'] ) ) {
				?>
				<li>
					<a class="wordpress" href="<?php echo esc_url( $instance['wordpress'] ); ?>" target="_blank"><?php echo Helper::get_svg_icon( 'wordpress' ); ?></a>
				</li>
				<?php
			}
			if ( ! empty( $instance['youtube'] ) ) {
				?>
				<li>
					<a class="youtube" href="<?php echo esc_url( $instance['youtube'] ); ?>" target="_blank"><?php echo Helper::get_svg_icon( 'play-circle' ); ?></a>
				</li>
				<?php
			}
			if ( ! empty( $instance['rss'] ) ) {
				?>
				<li>
					<a class="rss" href="<?php echo esc_url( $instance['rss'] ); ?>" target="_blank"><?php echo Helper::get_svg_icon( 'rss-solid' ); ?></a>
				</li>
				<?php
			}
			?>			
		</ul>

		<?php
		echo wp_kses_post( $args['after_widget'] );
	}

	/**
	 * Widget data updater function which is inputed from widget input field and then show 
	 * in widget output fields or frontend.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();

		$instance['title']		= ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['facebook']	= ( ! empty( $new_instance['facebook'] ) ) ? sanitize_text_field( $new_instance['facebook'] ) : '';
		$instance['twitter']	= ( ! empty( $new_instance['twitter'] ) ) ? sanitize_text_field( $new_instance['twitter'] ) : '';
		$instance['linkedin']	= ( ! empty( $new_instance['linkedin'] ) ) ? sanitize_text_field( $new_instance['linkedin'] ) : '';
		$instance['pinterest']	= ( ! empty( $new_instance['pinterest'] ) ) ? sanitize_text_field( $new_instance['pinterest'] ) : '';
		$instance['youtube']	= ( ! empty( $new_instance['youtube'] ) ) ? sanitize_text_field( $new_instance['youtube'] ) : '';
		$instance['rss']		= ( ! empty( $new_instance['rss'] ) ) ? sanitize_text_field( $new_instance['rss'] ) : '';
		$instance['instagram']	= ( ! empty( $new_instance['instagram'] ) ) ? sanitize_text_field( $new_instance['instagram'] ) : '';
		$instance['github']		= ( ! empty( $new_instance['github'] ) ) ? sanitize_text_field( $new_instance['github'] ) : '';
		$instance['wordpress']	= ( ! empty( $new_instance['wordpress'] ) ) ? sanitize_text_field( $new_instance['wordpress'] ) : '';

		return $instance;
	}

	/**
	 * Widget input form show in admin in widget management area
	 */
	public function form( $instance ) {
		$title		= ( ! empty( $instance['title'] ) ) ? sanitize_text_field( $instance['title'] ) : '';
		$facebook	= ( ! empty( $instance['facebook'] ) ) ? sanitize_text_field( $instance['facebook'] ) : '';
		$twitter	= ( ! empty( $instance['twitter'] ) ) ? sanitize_text_field( $instance['twitter'] ) : '';
		$linkedin	= ( ! empty( $instance['linkedin'] ) ) ? sanitize_text_field( $instance['linkedin'] ) : '';
		$pinterest	= ( ! empty( $instance['pinterest'] ) ) ? sanitize_text_field( $instance['pinterest'] ) : '';
		$youtube	= ( ! empty( $instance['youtube'] ) ) ? sanitize_text_field( $instance['youtube'] ) : '';
		$instagram	= ( ! empty( $instance['instagram'] ) ) ? sanitize_text_field( $instance['instagram'] ) : '';
		$github		= ( ! empty( $instance['github'] ) ) ? sanitize_text_field( $instance['github'] ) : '';
		$wordpress	= ( ! empty( $instance['wordpress'] ) ) ? sanitize_text_field( $instance['wordpress'] ) : '';
		$rss		= ( ! empty( $instance['rss'] ) ) ? sanitize_text_field( $instance['rss'] ) : '';

		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>"><?php esc_html_e( 'Title', 'untree' ); ?>:</label>
			<input class="widefat" type="text" id="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_name( 'facebook' ) ); ?>"><?php esc_html_e( 'Facebook URL', 'untree' ); ?>:</label>
			<input class="widefat" type="text" id="<?php echo esc_attr( $this->get_field_name( 'facebook' )); ?>" name="<?php echo esc_attr( $this->get_field_name( 'facebook' ) ); ?>" value="<?php echo esc_url( $facebook ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_name( 'twitter' ) ); ?>"><?php esc_html_e( 'Twitter URL', 'untree' ); ?>:</label>
			<input class="widefat" type="text" id="<?php echo esc_attr( $this->get_field_name( 'twitter' )); ?>" name="<?php echo esc_attr( $this->get_field_name( 'twitter' ) ); ?>" value="<?php echo esc_url( $twitter ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_name( 'linkedin' ) ); ?>"><?php esc_html_e( 'Linkedin URL', 'untree' ); ?>:</label>
			<input class="widefat" type="text" id="<?php echo esc_attr( $this->get_field_name( 'linkedin' )); ?>" name="<?php echo esc_attr( $this->get_field_name( 'linkedin' ) ); ?>" value="<?php echo esc_url( $linkedin ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_name( 'pinterest' ) ); ?>"><?php esc_html_e( 'Pinterest URL', 'untree' ); ?>:</label>
			<input class="widefat" type="text" id="<?php echo esc_attr( $this->get_field_name( 'pinterest' )); ?>" name="<?php echo esc_attr( $this->get_field_name( 'pinterest' ) ); ?>" value="<?php echo esc_url( $pinterest ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_name( 'youtube' ) ); ?>"><?php esc_html_e( 'Youtube URL', 'untree' ); ?>:</label>
			<input class="widefat" type="text" id="<?php echo esc_attr( $this->get_field_name( 'youtube' )); ?>" name="<?php echo esc_attr( $this->get_field_name( 'youtube' ) ); ?>" value="<?php echo esc_url( $youtube ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_name( 'instagram' ) ); ?>"><?php esc_html_e( 'Instagram URL', 'untree' ); ?>:</label>
			<input class="widefat" type="text" id="<?php echo esc_attr( $this->get_field_name( 'instagram' )); ?>" name="<?php echo esc_attr( $this->get_field_name( 'instagram' ) ); ?>" value="<?php echo esc_url( $instagram ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_name( 'github' ) ); ?>"><?php esc_html_e( 'GitHub URL', 'untree' ); ?>:</label>
			<input class="widefat" type="text" id="<?php echo esc_attr( $this->get_field_name( 'github' )); ?>" name="<?php echo esc_attr( $this->get_field_name( 'github' ) ); ?>" value="<?php echo esc_url( $github ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_name( 'wordpress' ) ); ?>"><?php esc_html_e( 'WordPress URL', 'untree' ); ?>:</label>
			<input class="widefat" type="text" id="<?php echo esc_attr( $this->get_field_name( 'wordpress' )); ?>" name="<?php echo esc_attr( $this->get_field_name( 'wordpress' ) ); ?>" value="<?php echo esc_url( $wordpress ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_name( 'rss' ) ); ?>"><?php esc_html_e( 'Rss Feed URL', 'untree' ); ?>:</label>
			<input class="widefat" type="text" id="<?php echo esc_attr( $this->get_field_name( 'rss' )); ?>" name="<?php echo esc_attr( $this->get_field_name( 'rss' ) ); ?>" value="<?php echo esc_url( $rss ); ?>" />
		</p>
		<?php
	}
}