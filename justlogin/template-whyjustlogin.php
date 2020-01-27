<?php
/**
 * Template Name: Why JustLogin
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
	jQuery('body').addClass('page-id-12');
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
<?php /*?><div class="container-fluid" id="home-row7">
		<div class="row">
			<div class="col-md-6" id="home-row7-col1" style="background: url('<?php echo get_site_url(); ?>/wp-content/uploads/2018/07/home-row7-bg1.png'); background-size: 101% 101%;">
				<div class="pull-right">
					<h2><?php echo get_field( "red_column_title" ); ?></h2>
					<p><?php echo get_field( "red_column_text" ); ?></p>
					<div class="btn btn-red btn-red2"><a class="btn-reda" href="<?php echo get_field( "red_column_button_link" ); ?>" style="width: 100%;"><?php echo get_field( "red_column_button_text" ); ?></a></div>
				</div>
			</div>
			<div class="col-md-6" id="home-row7-col2" style="background: url('<?php echo get_site_url(); ?>/wp-content/uploads/2018/07/home-row7-correct.png'); background-size: 101% 101%;">
				<div class="pull-left">
					<h2><?php echo get_field( "purple_column_title" ); ?></h2>
					<p><?php echo get_field( "purple_column_text" ); ?></p>
					<div class="btn btn-red btn-red2"><a class="btn-reda" href="<?php echo get_field( "purple_column_button_link" ); ?>" style="width: 100%;"><?php echo get_field( "purple_column_button_text" ); ?></a></div>
				</div>
			</div>
		</div>
	</div><?php */?>
</div><!-- Wrapper end -->

<?php get_footer(); ?>
