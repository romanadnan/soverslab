
<section class="container">
		<div class="row">
			<div class="col-md-12">
				<h3 style="color:red">Template: post_setup.php</h3>
			</div>
		</div>
	</section>

<?php 
if ( have_posts() ) :
	while ( have_posts() ) : the_post();
	?>
	<h1 style="color:red">post_setup.php page</h1>
	<div class="blog_area">
		<div class="post_thumb">
			<a href="<?php the_permalink(); ?>"><?php echo the_post_thumbnail( 'post-thumbnails' ); ?></a>
		</div>
		<div class="post_details">
			<span class="dashicons dashicons-format-<?php echo get_post_format( $post->ID ); ?>"></span>
			<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<?php the_content(); ?>
		</div>
	</div>
<?php 
endwhile;
else : 
	_e( 'No post found!', 'untree' );
endif;
?>


<section class="container">
		<div class="row">
			<div class="col-md-12">
				<h3 style="color:red">Template: post_setup.php</h3>
			</div>
		</div>
	</section>