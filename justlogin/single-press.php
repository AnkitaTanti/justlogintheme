<?php
/**
 * The template for displaying all single posts.
 *
 * @package understrap
 */

get_header();
$container   = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="single-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<!-- Do the left sidebar check -->
			<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

			<main class="site-main" id="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'loop-templates/content', 'single-press' ); ?>

						<?php understrap_post_nav(); ?>

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
		<?php //get_template_part( 'global-templates/right-sidebar-check' ); ?>

	</div><!-- .row -->

</div><!-- Container end -->

</div><!-- Wrapper end -->


<div class="container">
<!--	RECOMMENDED POST START		-->
	<div class="" id="recommended">
	<?php 
	$template1 = array(
		'template' => '% %l'
	);
	$posts = get_field('recommended_post');

	if( $posts ): ?>
		<?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
			<?php setup_postdata($post); ?>
			

					<div class="recommended-col">
					<?php
						if ( has_post_thumbnail() ) {
							echo '<p class="result-thumbnail"><a href="';
							echo get_permalink();
							echo '">';
							the_post_thumbnail("full");
							echo '</a></p>';
						}
					?>
					<div class="">
						<div>
						<p class=""><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
							<?php the_taxonomies($template1); ?>
					</div>

					</div>
				</div>
			
		<?php endforeach; ?>
		<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
	<?php endif; ?>
	</div>

</div>
	<?php wp_reset_query();	 // Restore global post data stomped by the_post(). ?>
	
	
<?php get_footer(); ?>
