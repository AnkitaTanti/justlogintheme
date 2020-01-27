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

					<?php get_template_part( 'loop-templates/content', 'single-blog' ); ?>

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
<!--	RECOMMENDED POST END	-->
	
<?php /*?><?php 
	// Query Recent Events
	// args
	$template1 = array(
		'template' => '% %l'
	);
	$taxonomy = 'blog_categories';
	$args = array(
		'numberposts'	=> -1,
		'posts_per_page'=> '2',
		'post_type'		=> 'blog-post',
		'orderby' => 'date',
		'order'   => 'DESC',
		'tax_query' => array(
			array(
			'taxonomy' => 'blog_categories',   // taxonomy name
			'field' => 'blog_categories',           // term_id, slug or name
			'terms' => 'blog_categories',                  // term id, term slug or term name
			))
	);
	$the_query = new WP_Query( $args );

	?>
	
	
	<?php if( $the_query->have_posts() ): ?>
	
	<div class="" id="recommended">
		<?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
			
			<div class="recommended-col">
			<?php
				if ( has_post_thumbnail() ) {
					echo '<p class="result-thumbnail">';
					the_post_thumbnail("medium");
					echo '</p>';
				}
			?>
			<div class="">
				<div>
				<p class=""><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
					<?php the_taxonomies($template1); ?>
			</div>
		
			</div>
		</div>
		<?php endwhile; ?>
	</div>
	<?php endif; ?><?php */?>
</div>
	<?php wp_reset_query();	 // Restore global post data stomped by the_post(). ?>
	
	<div class="container next-previous-posts">
		<?php
		$previous = get_previous_post();
		$next = get_next_post();
		$previousLink = get_previous_posts_link();
		$nextLink = get_next_posts_link();
		
		if ( get_previous_post() ) { ?>
		<div class="previous-post-zh">
		  	<div class="previous-post-read"><?php previous_post_link( '%link', 'Read Previous'); ?></div>
			<div class="border-post">
				<div class="previous-post-image"><?php previous_post_link( '%link', get_the_post_thumbnail($previous->ID)); ?></div>
				<div class="blog-nav-title previous-post-title"><?php previous_post_link( '%link', '%title'); ?></div>
			</div>
		</div>
		<?php previous_posts_link(); ?>
		<?php }

		if ( get_next_post() ) { ?>
		<div class="next-post-zh">
		  	<div class="next-post-read"><?php next_post_link( '%link', 'Read Next'); ?></div>
			<div class="border-post">
				<div class="next-post-image"><?php next_post_link( '%link', get_the_post_thumbnail($next->ID)); ?></div>
				<div class="blog-nav-title next-post-title"><?php next_post_link( '%link', '%title'); ?></div>
			</div>
		</div>
		<?php } ?>
		
		
	</div>
	
	

<?php get_footer(); ?>
