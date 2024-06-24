<?php
/**
 * @author  SoversLab
 * @since   1.0
 * @version 1.0
 */

use SoversLab\SoversLab\Helper;

$thumb_size = 'soverslabtheme-size2';
$get_cat_ob = get_the_category();
?>

<div class="col-md-6 mb-4 mb-lg-0 col-lg-4" id="post-<?php the_ID(); ?>">
    <div class="news-item">
		<div class="theme-blog-card__thumbnail">
			<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( $thumb_size ); ?></a>
		</div>
		<div class="news-contents mb-4">
			<span class="post-meta">
				<?php if ( ! empty( $get_cat_ob ) ) {
					$term_link	= isset(  $get_cat_ob[0] ) ? get_category_link( $get_cat_ob[0]->cat_ID ) : '';
					$cat_name	= isset( $get_cat_ob[0] ) ? $get_cat_ob[0]->name : '';
					$total_term	= count( $get_cat_ob );

					printf( '<a href="%s">%s</a>', esc_url( $term_link ), esc_html( $cat_name ) );

					if ( $total_term > 1 ) {
						$total_term = $total_term - 1;
						
						foreach ( array_slice($get_cat_ob, 1) as $cat ) {
							$term_label = trim( "{$cat->name}" );
							$term_link  = get_category_link( $cat->cat_ID);;

							printf( '<a href="%s">%s</a>', esc_url( $term_link ), esc_html( $term_label ) );
						}						
					}
				}
				?>				
				<ul>
					<li><i class="fa-regular fa-calendar-days"></i><?php echo get_the_date(); ?></li>
					<li><i class="fa-brands fa-readme"></i><?php echo Helper::get_reading_time( get_the_content(), 'span' ); ?></li>
				</ul>
			</span>
			<h5 class="blog-post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
        </div>

        <p class="mb-0">
			<a href="<?php the_permalink(); ?>" class="blog-read-more-arrow">
              	<?php _e( 'Read More', 'soverslab' ); ?><i class="fa-solid fa-angles-right"></i>
            </a>
		</p>
		
    </div> <!-- /.news-item -->
</div>