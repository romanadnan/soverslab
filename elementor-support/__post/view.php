<?php
/**
 * @author  SoversLab
 * @since   1.0
 * @version 1.0
 */

namespace SoversLab\Theme\Elementor;

use SoversLab\Untree\Helper;

//$thumb_size = 'soverslabtheme-size2';
$query      = $data['query'];
$columns    = $data['number_of_columns'];
$show_btn   = ( isset( $data['show_more_button'] ) && 'yes' === $data['show_more_button'] ) ?  true : false ;
$blog_url   = get_option( 'page_for_posts', false );
$btn_text   = isset( $data['show_more_button_text'] ) ? $data['show_more_button_text'] : esc_html__( 'See all the guides', 'untree' );

if ( $query->have_posts() ): ?>

	<div class="row">

		<?php while ( $query->have_posts() ) : $query->the_post();
			
			$get_cat_ob		= get_the_category();
			$cat_link		= get_category_link( $get_cat_ob[0]->cat_ID );
			$cat_name		= $get_cat_ob[0]->name;
			$author_name	= get_the_author_meta( 'display_name' );
			$author_avater	= get_avatar( get_the_author_meta('ID') );
			?>

			<div class="col-md-6 mb-4 mb-lg-0 col-lg-<?php echo esc_attr( $columns ); ?>">

				<div class="news-item">
					
					<div class="vcard d-flex align-items-center mb-4">

						<?php if ( $data['show_post_avater'] ) : ?>

							<div class="img-wrap">

								<?php echo $author_avater; ?>

							</div>

						<?php endif; ?>

						<?php if ( $data['show_post_author_name'] || $data['show_date'] ) : ?>

							<div class="post-meta">

								<?php if ( $data['show_post_author_name'] ) : ?>

									<strong><?php echo $author_name; ?></strong>

								<?php endif; ?>

								<?php if ( $data['show_date'] ) : ?>

									<span><?php the_time( get_option( 'date_format' ) ); ?></span>

								<?php endif; ?>

							</div>

						<?php endif; ?>

					</div>

					<div class="news-contents mb-4">

						<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

						<?php if ( $data['show_excpert'] ) : ?>

							<p><?php echo get_the_excerpt(); ?></p>

						<?php endif; ?>

						<?php if ( $data['show_category'] || $data['show_reading_time'] ) : ?>

							<span class="post-meta-2">

								<?php if ( $data['show_category'] ) : ?>

									<a href="<?php echo esc_url( $cat_link ); ?>" class="theme-blog-cat"><?php printf( "%s", esc_html( $cat_name ) ); ?></a>

								<?php endif; ?>
								
								<?php if ( $data['show_reading_time'] ) : ?>

									<?php echo Helper::get_reading_time( get_the_content(), 'span' ); ?>

								<?php endif; ?>

							</span>

						<?php endif; ?>

					</div>

					<p class="mb-0">

						<a href="<?php the_permalink(); ?>" class="read-more-arrow">

							<svg class="bi bi-arrow-right" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" d="M10.146 4.646a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L12.793 8l-2.647-2.646a.5.5 0 0 1 0-.708z"/>
								<path fill-rule="evenodd" d="M2 8a.5.5 0 0 1 .5-.5H13a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 8z"/>
							</svg>

						</a>

					</p>

				</div>

			</div>

		<?php endwhile; ?>

	</div>

	<?php if ( $blog_url && $show_btn ) : ?>

		<div class="theme-more-btn">

			<a href="<?php echo esc_attr(  get_permalink( $blog_url ) ); ?>"><span class="theme-more-btn__text"><?php echo esc_html( $btn_text ); ?></span></a>

		</div>

	<?php endif; ?>

<?php else: ?>

	<div><?php esc_html_e( 'Currently there are no posts', 'untree' ); ?></div>

<?php endif; ?>

<?php wp_reset_postdata(); ?>