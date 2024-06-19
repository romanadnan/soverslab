<?php
/**
 * @author  SoversLab
 * @since   1.0
 * @version 1.0
 */
?>

<section class="container">
	<div class="row">
		<div class="col-md-12">
			<h3 style="color:red">Template: content-page.php</h3>
		</div>
	</div>
</section>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php the_content(); ?>

	<?php 	( array( 'before' => '<div class="page-links">', 'after'  => '</div>', 'link_before' => '<span class="page-number">', 'link_after'  => '</span>' ) ); ?>

</div>



<section class="container">
	<div class="row">
		<div class="col-md-12">
			<h3 style="color:red">Template: content-page.php</h3>
		</div>
	</div>
</section>