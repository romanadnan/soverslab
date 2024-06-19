<?php
/**
 * @author  SoversLab
 * @since   1.0
 * @version 1.0
 */
?>

<!-- Start menu area -->
<nav class="site-nav dark js-site-navbar mb-5 site-navbar-target">
	<div class="container">
		<div class="site-navigation">
			

			<!-- Site Logo -->
			<?php if ( function_exists( 'the_custom_logo' ) && get_theme_mod( 'custom_logo' ) ) : ?>

				<div class="logo m-0 float-left">
					<?php the_custom_logo(); ?>
				</div>

			<?php else : ?>

				<a class="logo m-0 float-left" href="<?php echo esc_url( home_url( '/' ) ); ?>">
					<h1 class="site-title"><?php echo esc_html( get_bloginfo( 'name' ) )?></h1>
				</a>

			<?php endif; ?>

			

			<!-- Site header navigation -->
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>

			<!-- Theme Login & Register button -->
			<?php if ( ! is_user_logged_in() ) : ?>
				<ul class="js-clone-nav d-none mt-1 d-lg-inline-block site-menu float-right">
					<li class="cta-button-outline">
						<a href="signin.html" data-toggle="modal" onclick="openLoginModal();"><?php esc_html_e( 'Sign in', 'untree' ); ?></a>
					</li>					
					<li class="cta-primary">
						<a href="register.html" data-toggle="modal" onclick="openRegisterModal();"><?php esc_html_e( 'Register', 'untree' ); ?></a>
					</li>
				</ul>
			<?php else : ?>						

				<?php
				$avatar_img 		= get_avatar( get_current_user_id(), 40, null, null, array( 'class' => 'rounded-circle' ) );
				$author_id     		= get_user_meta( get_current_user_id(), 'pro_pic', true );
				$profile_image[]	= wp_get_attachment_image_src( $author_id );
				
				//if ( empty( $profile_image ) )

					echo wp_kses_post( $avatar_img );
					printf( '<span> %s,<span/> %s ', esc_html__( 'Hi', 'untree' ) , get_the_author_meta('display_name', get_current_user_id() ) ) ;

				//} else {
					//printf( '<img width="40" src="%s" class="avatar rounded-circle"/>', esc_url( $profile_image[0] ) );
				//}
				?>

			<?php endif; ?>
			

			<!-- Mobile Menu -->
			<a href="#" class="burger ml-auto float-right site-menu-toggle js-menu-toggle d-inline-block dark d-lg-none" data-toggle="collapse" data-target="#main-navbar">
				<span></span>
			</a>

		</div>
	</div>
</nav><!-- End menu area -->