<?php
/**
 * Template Name: Resources Page
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
	jQuery('body').addClass('page-id-20');
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

	<!--	Start of Recent Events		-->
	<?php
	// Query Recent Events
	// args
	$args = array(
		'numberposts'	=> -1,
		'post_type'		=> array('events', 'blog-post', 'webinars','knowledge_hub'),
		'orderby' => 'date',
		'order'   => 'DESC',
		'meta_query' => array(
			array(
				'key' => 'featured_resources', // name of custom field
				'value' => '"featured"', // matches exactly
				'compare' => 'LIKE'
			)
		)
	);
	$the_query = new WP_Query( $args );

	?>
	<?php if( $the_query->have_posts() ): ?>

	<div id="" class="result-row">
		<?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
			<div class="result-col" >


			<?php
				if ( has_post_thumbnail() ) {
					echo '<p class="result-thumbnail">';
					the_post_thumbnail("medium");
					echo '</p>';
				}
			?>
			<div class="result-content">
				<div>
				<p class="result-category">
					<?php if ( 'blog-post' == get_post_type() ) { ?>
						<a href="<?php echo get_site_url(); ?>/blog/">BLOG</a>
					<?php } else if ( 'events' == get_post_type() ) { ?>
						<a href="<?php echo get_site_url(); ?>/events/">EVENTS</a>
					<?php } else if ( 'webinars' == get_post_type() ) { ?>
						<a href="<?php echo get_site_url(); ?>/webinars/">WEBINARS</a>
					<?php } else if ( 'knowledge_hub' == get_post_type() ) { ?>
						<a href="<?php echo get_site_url(); ?>/knowledge-hub/">KNOWLEDGE HUB</a>
					<?php } ?>

				</p>
				<p class="result-date"><?php echo get_the_date(); ?></p>
				<div class="result-title">
					<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				</div>
				</div>
				<p class="result-read"><a href="<?php the_permalink(); ?>">Read More ></a></p>
			</div>


		</div>
		<?php endwhile; ?>
	</div>
	<?php endif; ?>

	<?php wp_reset_query();	 // Restore global post data stomped by the_post(). ?>
	<!--	End of Recent Posts		-->


</div><!-- Container end -->
</div><!-- Wrapper end -->

<?php get_footer(); ?>
