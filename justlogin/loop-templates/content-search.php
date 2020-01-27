<?php
/**
 * Search results partial template.
 *
 * @package understrap
 */

?>
<article style="margin: 15px auto 35px;" <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">

		

		<?php if ( 'post' == get_post_type() ) : ?>

			<div class="entry-meta">

				<?php understrap_posted_on(); ?>

			</div><!-- .entry-meta -->

		<?php endif; ?>

	</header><!-- .entry-header -->

	<div class="entry-summary">
		<?php the_title( sprintf( '<h3><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
		'</a></h2>' ); ?>
		<p style="margin-bottom: 10px;" ><?php echo get_the_excerpt(); ?></p>

	</div><!-- .entry-summary -->

	<footer class="entry-footer">

		<?php understrap_entry_footer(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
