<?php
/**
 * @author  SoversLab
 * @since   1.0
 * @version 1.0
 */

use SoversLab\Untree\Helper;
?>

<div class="ml-auto">

	<div class="quick-contact">

		<?php if ( isset( $data['heading'] ) && !empty( $data['heading'] ) ) : ?>

			<h3 class="h5 mb-4"><?php echo esc_html( $data['heading'] ); ?></h3>

		<?php endif; ?>

		<?php if ( isset( $data['address'] ) && !empty( $data['address'] ) ) : ?>

			<address class="text-black d-flex">

				<?php echo Helper::get_svg_icon( 'map-marker-solid' ); ?>
				<span><?php echo esc_html( $data['address'] ); ?></span>

			</address>

		<?php endif; ?>

		<?php if ( isset( $data['phone_1'] ) || isset( $data['phone_2'] ) || isset( $data['email'] ) || isset( $data['website'] ) ) : ?>

            <ul class="list-unstyled ul-links mb-4">

				<?php if ( isset( $data['phone_1'] ) && !empty( $data['phone_1'] ) ) : ?>

					<li><a href="tel://11234567890" class="d-flex">

						<?php echo Helper::get_svg_icon( 'phone-alt-solid' ); ?>
						<span><?php echo esc_html( $data['phone_1'] ); ?></span>

					</a></li>

				<?php endif; ?>

				<?php if ( isset( $data['phone_2'] ) && !empty( $data['phone_2'] ) ) : ?>

					<li><a href="tel://11234567890" class="d-flex">

						<?php echo Helper::get_svg_icon( 'phone-alt-solid' ); ?>
						<span><?php echo esc_html( $data['phone_2'] ); ?></span>

					</a></li>

				<?php endif; ?>

				<?php if ( isset( $data['email']['url'] ) ) : ?>

					<li><a href="mailto:info@mydomain.com" class="d-flex">
						
						<?php echo Helper::get_svg_icon( 'envelope-open' ); ?>
						<span><?php echo esc_html( $data['email']['url'] ); ?></span>

					</a></li>

				<?php endif; ?>

				<?php if ( isset( $data['website']['url'] ) ) : ?>

					<li><a href="https://untree.co/" target="_blank" class="d-flex">
						
						<?php echo Helper::get_svg_icon( 'globe-solid' ); ?>
						<span><?php echo esc_html( $data['website']['url'] ); ?></span>

					</a></li>

				<?php endif; ?>

            </ul>

		<?php endif; ?>

	</div>

</div>