<?php
/**
 * @author  SoversLab
 * @since   1.0
 * @version 1.0
 */

use SoversLab\SoversLab\Helper;


get_header(); 
?>

<div class="untree_co-section bg-light">
    <div class="container">
		<div class="row">
			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'template-parts/content-blog' ); ?>
				<?php endwhile; ?>
			<?php else: ?>
				<?php get_template_part( 'template-parts/content', 'none' ); ?>
			<?php endif; ?>

		</div>
		
		<?php echo Helper::get_paginate_links(); ?>			
		<?php get_sidebar(); ?>			
		
	</div>
</div>
	

<?php get_footer(); ?>