<?php
/**
 * @author  SoversLab
 * @since   1.0
 * @version 1.0
 */

namespace SoversLab\Untree;

class Contact_Widget extends \WP_Widget {

	public function __construct() {
		$id = 'untree_contact';
		parent::__construct(
            $id, // Base ID
            esc_html__( 'Untree: Contact', 'untree' ), // Name
            array( 
				'description' => esc_html__( 'Untree: Theme footer contact info', 'untree' ),
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

		if ( !empty( $instance['address'] ) ) {
			?>
			<address><?php echo esc_html( $instance['address'] ); ?></address>
			<?php
		}
		?>
        <ul class="list-unstyled links mb-4">		
			<?php
			if ( !empty( $instance['phone_1'] ) ) {
				?>
				<li>
					<a class="phone_1" href="tel://<?php echo esc_url( $instance['phone_1'] ); ?>" target="_blank"><?php echo esc_html( $instance['phone_1'] ); ?></a>
				</li>
				<?php
			}
			if ( !empty( $instance['phone_2'] ) ) {
				?>
				<li>
					<a class="phone_2" href="tel://<?php echo esc_url( $instance['phone_2'] ); ?>" target="_blank"><?php echo esc_html( $instance['phone_2'] ); ?></a>
				</li>
				<?php
			}
			if ( !empty( $instance['email'] ) ) {
				?>
				<li>
					<a class="email" href="<?php echo esc_url( $instance['email'] ); ?>" target="_blank"><?php echo esc_html( $instance['email'] ); ?></a>
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
	public function update( $new_instance, $old_instance ){
		$instance = array();

		$instance['title']		= ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['address']	= ( ! empty( $new_instance['address'] ) ) ? sanitize_text_field( $new_instance['address'] ) : '';
		$instance['phone_1']	= ( ! empty( $new_instance['phone_1'] ) ) ? sanitize_text_field( $new_instance['phone_1'] ) : '';
		$instance['phone_2']	= ( ! empty( $new_instance['phone_2'] ) ) ? sanitize_text_field( $new_instance['phone_2'] ) : '';
		$instance['email']		= ( ! empty( $new_instance['email'] ) ) ? sanitize_text_field( $new_instance['email'] ) : '';

		return $instance;
	}

	/**
	 * Widget input form show in admin in widget management area
	 */
	public function form( $instance ){
		$title		= ( ! empty( $instance['title'] ) ) ? sanitize_text_field( $instance['title'] ) : '';
		$address	= ( ! empty( $instance['address'] ) ) ? sanitize_text_field( $instance['address'] ) : '';
		$phone_1	= ( ! empty( $instance['phone_1'] ) ) ? sanitize_text_field( $instance['phone_1'] ) : '';
		$phone_2	= ( ! empty( $instance['phone_2'] ) ) ? sanitize_text_field( $instance['phone_2'] ) : '';
		$email		= ( ! empty( $instance['email'] ) ) ? sanitize_text_field( $instance['email'] ) : '';
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>"><?php esc_html_e( 'Title', 'untree' ); ?>:</label>
			<input class="widefat" type="text" id="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_name( 'address' ) ); ?>"><?php esc_html_e( 'Address', 'untree' ); ?>:</label>
			<input class="widefat" type="text" id="<?php echo esc_attr( $this->get_field_name( 'address' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'address' ) ); ?>" value="<?php echo esc_attr( $address ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_name( 'phone_1' ) ); ?>"><?php esc_html_e( 'Phone 1', 'untree' ); ?>:</label>
			<input class="widefat" type="text" id="<?php echo esc_attr( $this->get_field_name( 'phone_1' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'phone_1' ) ); ?>" value="<?php echo esc_attr( $phone_1 ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_name( 'phone_2' ) ); ?>"><?php esc_html_e( 'Phone 2', 'untree' ); ?>:</label>
			<input class="widefat" type="text" id="<?php echo esc_attr( $this->get_field_name( 'phone_2' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'phone_2' ) ); ?>" value="<?php echo esc_attr( $phone_2 ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_name( 'email' ) ); ?>"><?php esc_html_e( 'Email', 'untree' ); ?>:</label>
			<input class="widefat" type="email" id="<?php echo esc_attr( $this->get_field_name( 'email' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'email' ) ); ?>" value="<?php echo esc_attr( $email ); ?>" />
		</p>
		<?php
	}
}