<?php
/**
 * @author  SoversLab
 * @since   1.0
 * @version 1.0
 */

namespace SoversLab\Theme\Elementor;
?>

<div>

	<?php if ( $data['image']['url'] ) : ?>

		<img src="<?php echo $data['image']['url']; ?>" alt="Image" class="img-fluid mb-3 w-50 rounded-circle">

	<?php endif; ?>
	
	<?php if ( $data['name'] ) : ?>

		<h3 class="h5 font-weight-bold"><?php echo esc_html( $data['name'] ); ?></h3>

	<?php endif; ?>

	<?php if ( $data['designation'] ) : ?>

		<h5><?php echo esc_html( $data['designation'] ); ?></h5>

	<?php endif; ?> 

	<?php if ( $data['about_team_member'] ) : ?>

		<p><?php echo esc_html( $data['about_team_member'] ); ?></p>

	<?php endif; ?> 
	
</div>