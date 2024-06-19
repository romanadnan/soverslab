<?php
/**
 * @author  SoversLab
 * @since   1.0
 * @version 1.0
 */

use SoversLab\SoversLab\Helper;

$thumb_size = 'wpwaxtheme-size2';
$get_cat_ob = get_the_category();
?>

<!-- <section class="container">
	<div class="row">
		<div class="col-md-12">
			<h3 style="color:red">Template: content-blog.php</h3>
		</div>
	</div>
</section> -->




<div class="col-md-6 mb-4 mb-lg-0 col-lg-4" id="post-<?php the_ID(); ?>">
    <div class="news-item">
		<div class="vcard d-flex align-items-center mb-4">

			<?php $avater = get_avatar( get_the_author_meta('ID') ); ?>
			<?php if ( ! empty( $avater ) ) : ?>

				<div class="img-wrap">
					<?php echo $avater; ?>
				</div>

			<?php endif; ?>

			<div class="post-meta">			
				<strong><?php echo get_the_author(); ?></strong>
				<span><?php echo get_the_date(); ?></span>
			</div>
		</div>

        <div class="news-contents mb-4">

            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

            <p><?php the_excerpt(); ?></p>

			<span class="post-meta-2">
				<?php if ( ! empty( $get_cat_ob ) ) {

					$term_link	= isset(  $get_cat_ob[0] ) ? get_category_link( $get_cat_ob[0]->cat_ID ) : '';
					$cat_name	= isset( $get_cat_ob[0] ) ? $get_cat_ob[0]->name : '';
					$total_term	= count( $get_cat_ob );

					printf( '<a href="%s"><span>%s</span> %s</a>', esc_url( $term_link ), esc_html__( 'In', 'onelisting' ) , esc_html( $cat_name ) );

					if ( $total_term > 1 ) {
						$total_term = $total_term - 1;
						
						printf( '<span class="theme-blog-category-meta__extran-count">%s %s</span>', esc_html( '+', 'onelisting' ), esc_html( $total_term ) );
							
						foreach ( array_slice($get_cat_ob, 1) as $cat ) {
							$term_label = trim( "{$cat->name}" );
							$term_link  = get_category_link( $cat->cat_ID);;

							printf( '<a href="%s">%s</a>', esc_url( $term_link ), esc_html( $term_label ) );
						}						
					}
				}
				?>
				<li><?php echo Helper::get_reading_time( get_the_content(), 'span' ); ?></li>
			</span>
            <!-- <span class="post-meta-2">Digital Service, 4 min read</span> -->

        </div>

        <p class="mb-0">
			<a href="<?php the_permalink(); ?>" class="read-more-arrow">
              	<svg class="bi bi-arrow-right" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
					<path fill-rule="evenodd" d="M10.146 4.646a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L12.793 8l-2.647-2.646a.5.5 0 0 1 0-.708z"/>
					<path fill-rule="evenodd" d="M2 8a.5.5 0 0 1 .5-.5H13a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 8z"/>
              	</svg>
            </a>
		</p>
		
    </div> <!-- /.news-item -->
</div>




<!-- <section class="container">
	<div class="row">
		<div class="col-md-12">
			<h3 style="color:red">Template: content-blog.php</h3>
		</div>
	</div>
</section> -->