<?php
/**
 * @author  SoversLab
 * @since   1.0
 * @version 1.0
 */

namespace SoversLab\Theme\Elementor;

use SoversLab\SoversLab\Helper;

$thumb_size = 'soverslabtheme-size2';
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

					<div class="theme-blog-card__thumbnail">

						<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( $thumb_size ); ?></a>

					</div>
					
					<div class="news-contents mb-4">

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

						<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

					</div>

					<p class="mb-0">
						<a href="<?php the_permalink(); ?>" class="blog-read-more-arrow">
							<?php _e( 'Read More', 'soverslab' ); ?><i class="fa-solid fa-angles-right"></i>
            			</a>
					</p>

				</div>
			</div>

		<?php endwhile; ?>

	</div>

	<?php if ( $blog_url && $show_btn ) : ?>

		<div class="post-more-btn">

			<a href="<?php echo esc_attr(  get_permalink( $blog_url ) ); ?>"><?php echo esc_html( $btn_text ); ?><i class="fa-solid fa-arrow-right-long"></i></a>

		</div>

	<?php endif; ?>

<?php else: ?>

	<div><?php esc_html_e( 'Currently there are no posts', 'soverslab' ); ?></div>

<?php endif; ?>

<?php wp_reset_postdata(); ?>