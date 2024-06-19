
<?php
/**
 * @author  SoversLab
 * @since   1.0
 * @version 1.0
 */

 
get_header(); ?>

	<section id="body_area">
		<div class="container">
			<div class="row">
				<div class="col-md-12 error_page">
					<p><?php _e( '404 Error - Page not Found', 'untree' ); ?></p>
					<h1><?php _e( 'Oops! Looks like something was wrong', 'untree' ); ?></h1>
					<div class="error_search">
						<?php get_search_form(); ?>
					</div>
					<a href="<?php echo home_url(); ?>" class="homepage"><?php _e( 'Go Homepage', 'untree' ); ?></a>
				</div>
			</div>
		</div>
	</section>

<?php get_footer(); ?>