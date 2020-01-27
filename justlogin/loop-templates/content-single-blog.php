<?php
/**
 * Single post partial template.
 *
 * @package understrap
 */

?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta">

			<?php //understrap_posted_on(); ?>
			

		</div><!-- .entry-meta -->
		<div class="after-title">
			<?php 
			$template2 = array(
				'template' => '% %l'
			);
			?>
			<p>Posted in <?php the_taxonomies($template2); ?> | by <?php 
				if(get_field('edit_author')==yes){
					if(get_field('post_author')){
						echo get_field('post_author');
					}else{
						echo 'Justlogin';}
				} else {echo get_the_author();} ?> on <?php echo get_the_date('j F Y'); ?></p>
			<p>Last updated on <?php echo get_the_modified_date('j F Y'); ?></p>
		</div>

	</header><!-- .entry-header -->

	<div class="blog-post-featured-img"><?php echo get_the_post_thumbnail( $post->ID, 'full' ); ?></div>

	<div class="entry-content">

		<?php the_content(); ?>

		<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
			'after'  => '</div>',
		) );
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php understrap_entry_footer(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
