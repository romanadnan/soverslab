<?php
/**
 * @author  SoversLab
 * @since   1.0
 * @version 1.0
 */

use \SoversLab\SoversLab\Helper;

get_header();
?>

<section class="container">
		<div class="row">
			<div class="col-md-12">
				<h3 style="color:red">Template: page.php</h3>
			</div>
		</div>
	</section>


	<section id="body_area">
		<div class="container">
			<div class="row">
				<div class="col-md-9">
					<?php //get_template_part( 'template-parts/post_setup' ); ?>
					<?php
					while ( have_posts() ){
						the_post();
						get_template_part( 'template-parts/content', 'page' );
						if ( comments_open() || get_comments_number() ){
							comments_template();
						}
					}
					?>					
				</div>
				<div class="col-md-3">
					<?php get_sidebar(); ?>
				</div>
			</div>
		</div>
	</section>


	<section class="container">
		<div class="row">
			<div class="col-md-12">
				<h3 style="color:red">Template: page.php</h3>
			</div>
		</div>
	</section>

<?php get_footer(); ?>