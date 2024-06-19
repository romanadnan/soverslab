<?php
/**
 * @author  SoversLab
 * @since   1.0
 * @version 1.0
 */

namespace SoversLab\Theme\Elementor;
?>

<div class="untree_co-section">
    <div class="container">
		<div class="row">
			<div class="col-12 text-center">

				<h2 class="heading"><?php echo esc_html( $data['title'] ); ?></h2>			

				<?php if ( $data['subtitle'] ) : ?>

					<p><?php echo wp_kses_post( $data['subtitle'] ); ?></p>

				<?php endif; ?>
			
			</div>	
		</div>
	</div>	
</div>