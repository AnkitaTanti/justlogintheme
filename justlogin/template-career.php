<?php
/**
 * Template Name: Career
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
	jQuery('body').addClass('page-id-628');
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
<div class="container" style="margin-bottom: 20px;">
	<script type="text/javascript" id="rbox-loader-script">
	if(!window._rbox){
	_rbox = { host_protocol:document.location.protocol, ready:function(cb){this.onready=cb;} };
	(function(d, e) {
		var s, t, i, src=['/static/client-src-served/widget/53526/rbox_api.js', '/static/client-src-served/widget/53526/rbox_impl.js'];
		t = d.getElementsByTagName(e); t=t[t.length - 1];
		for(i=0; i<src.length; i++) {
			s = d.createElement(e); s.src = _rbox.host_protocol + '//w.recruiterbox.com' + eval("src" + String.fromCharCode(91) + String(i) + String.fromCharCode(93));
			t.parentNode.insertBefore(s, t.nextSibling);
		}})(document, 'script');
	}
	</script>
</div>
</div><!-- Wrapper end -->

<?php get_footer(); ?>
