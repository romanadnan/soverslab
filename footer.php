<?php
/**
 * @author  SoversLab
 * @since   1.0
 * @version 1.0
 */


	?>
	</div><!-- #content -->
	<div class="site-footer">
		<div class="footer-dots"></div> <!-- /.footer-dots -->
		<div class="container">

			<div class="row">
				<div class="col-lg-4">
					<?php dynamic_sidebar( 'footer-1' ); ?>
				</div><!-- /.col-lg-3 -->

				<div class="col-lg-2 ml-auto">
					<?php dynamic_sidebar( 'footer-2' ); ?>
				</div><!-- /.col-lg-3 -->

				<div class="col-lg-2">
					<?php dynamic_sidebar( 'footer-3' ); ?>				
				</div><!-- /.col-lg-3 -->


				<div class="col-lg-3">
					<?php dynamic_sidebar( 'footer-4' ); ?>
				</div><!-- /.col-lg-3 -->
			</div> <!-- /.row -->

			<div class="row mt-5">
				<div class="col-12 text-center">
					<p class="copyright"><?php _e( 'Copyright', 'untree' ); ?> &copy;<?php echo date('Y'); ?> <?php _e( '. All Rights Reserved.', 'untree' ); ?> &mdash; <?php _e( 'Designed with love by ', 'untree' ); ?><a href="http://soverslab.com">SoversLab</a>.
					</p>
				</div>
			</div>

		</div> <!-- /.container -->
	</div> <!-- /.site-footer -->

	<?php wp_footer(); ?>
		
</body>
</html>