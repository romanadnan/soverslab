<!-- <h1 style="color:red">blog_setup.php page</h1> -->
<?php 
echo get_the_title( get_option('page_for_posts', true) );
// if (is_page('blog')) {
// 	esc_html_e( 'All Blogs', 'untree');
// } else {
// 	echo 'No, it is not blog page';
// }
?>

	<section class="container">
		<div class="row">
			<div class="col-md-12">
				<h3 style="color:red">Template: blog_setup.php</h3>
			</div>
		</div>
	</section>


<div class="untree_co-section bg-light">
    <div class="container">

		<div class="row mb-5">
			<div class="col-12 text-center" data-aos="fade-up" data-aos-delay="0">
			<span class="caption"><?php // if (is_page('blog')) {
// 	esc_html_e( 'All Blogs', 'untree');
// 	} ?></span>
			
			</div>
		</div> <!-- /.row -->

		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>










				<div class="blog_area">
					<div class="post_thumb">
						<a href="<?php the_permalink(); ?>"><?php echo the_post_thumbnail( 'post-thumbnails' ); ?></a>
					</div>
					<div class="post_details">
						<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<?php the_excerpt(); ?>
					</div>
				</div>


			<?php endwhile; ?>

		<?php else : 
			_e( 'No post found!', 'untree' );
		endif;
		?>
		<div id="page_nav">
			<?php
			// if ( 'slab_pagenation' ) {
			// 	slab_pagenation();
			// } else {
				next_post_link();
				previous_post_link();
			// }
			?>
			<?php wp_link_pages(); ?>
		</div>


	</div>
</div>


<section class="container">
		<div class="row">
			<div class="col-md-12">
				<h3 style="color:red">Template: blog_setup.php</h3>
			</div>
		</div>
	</section>