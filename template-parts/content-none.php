<?php
/**
 * @author  SoversLab
 * @since   1.0
 * @version 1.0
 */
?>
<!-- <section class="container">
	<div class="row">
		<div class="col-md-12">
			<h3 style="color:red">Template: content-none.php</h3>
		</div>
	</div>
</section> -->



<section class="no-results not-found theme-no-result">

	<h2 class="page-title"><?php esc_html_e( 'Nothing Found', 'untree' ); ?></h2>

	<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

		<p><?php printf( wp_kses_post( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>', 'untree' ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>
	
	<?php elseif ( is_search() ) : ?>

		<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'untree' ); ?></p>
		
		<?php get_search_form(); ?>

	<?php else : ?>

		<p><?php esc_html_e( "It seems we can't find what you're looking for. Perhaps searching can help.", 'untree' ); ?></p>
		
		<?php get_search_form(); ?>

	<?php endif; ?>
	
</section>



<!-- <section class="container">
	<div class="row">
		<div class="col-md-12">
			<h3 style="color:red">Template: content-none.php</h3>
		</div>
	</div>
</section> -->