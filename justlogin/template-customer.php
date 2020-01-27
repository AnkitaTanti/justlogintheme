<?php
/**
 * Template Name: Customer Stories Page
 *
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package understrap
 */

get_header();

$container   = get_theme_mod( 'understrap_container_type' );

?>
<script>
	jQuery('body').addClass('page-id-16');
</script>
<div class="wrapper" id="page-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<!-- Do the left sidebar check -->
			<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

			<main class="site-main" id="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'loop-templates/content', 'page' ); ?>

					<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
					?>

				<?php endwhile; // end of the loop. ?>

			</main><!-- #main -->

		</div><!-- #primary -->

		<!-- Do the right sidebar check -->
		<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>

	</div><!-- .row -->

</div><!-- Container end -->
<div class="container" id="testimonial-container">
		<div class="row" id="testimonial-row">
			<?php
			// Query
//			$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
			// args
			$args = array(
				'post_type' => 'post'
			);
			$args['search_filter_id'] = 1264;
			$the_query = new WP_Query( $args );

			?>
			<?php if( $the_query->have_posts() ): ?>

				<?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>


					<div class="test-column">

					<?php
						if ( has_post_thumbnail() ) {
							echo '<p class="test-thumbnail"><a href="';
                        	the_permalink();
                        	echo '">';
							the_post_thumbnail("large");
							echo '</a></p>';
						}
					?>

						<div class="testword-container">
							<p class="test-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
							<p class="test-desc"><?php echo get_field('featured_testimonial_text'); ?></p>

                        	<?php

							// check if the repeater field has rows of data
							if( have_rows('display_small_text') ):

    						// loop through the rows of data
    						while ( have_rows('display_small_text') ) : the_row();?>

        					<p class="test-small"><?php echo get_sub_field('small_text'); ?></p>

    						<?php endwhile;
							endif;
							?>
						</div>
				</div>
				<?php endwhile; ?>
			<div class="pagination">
				<?php

					if(function_exists('wp_pagenavi')) {
						wp_pagenavi( array( 'query' => $the_query ) );
					}
				?>
			</div>
			<?php wp_reset_postdata(); endif; ?>

			</div>

			<?php wp_reset_query();
					// Restore global post data stomped by the_post(). ?>
			<?php //echo do_shortcode( '[ajax_load_more id="load-testimonial" container_type="div" css_classes="testimonial-list" post_type="post" scroll="false" button_label="Load more" posts_per_page="4" ]' ); ?>
	</div>


	<div><?php echo do_shortcode('[searchandfilter id="1264"]'); ?></div>
</div><!-- Wrapper end -->

<?php get_footer(); ?>
