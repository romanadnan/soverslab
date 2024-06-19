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
			<div class="col-md-9">
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'template-parts/content-single' ); ?>
					
					<div id="comments_area">
						<?php 
						if ( comments_open() ) {
							comments_template();
						}
						?>
					</div>
				<?php endwhile; ?>
			</div>
			<div class="col-md-3">
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>