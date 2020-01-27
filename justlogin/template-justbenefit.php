<?php
/**
 * Template Name: JustBenefit
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
	jQuery('body').addClass('page-id-741');
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

<div id="yellow-content" class="container-fluid">
	<div class="container">
	<?php if( get_field('yellow_enable_video') == 'yes' ) { ?>
		<div class="col-xs-12 col-lg-6 video-col1" >
			<h2><?php echo get_field('yellow_heading'); ?></h2>
			<p><?php echo get_field('yellow_description'); ?></p>
			<a href="<?php echo get_field('yellow_button_link'); ?>"><button class="btn btn-red"><?php echo get_field('yellow_button_text'); ?></button></a>
		</div>
		<div class="col-xs-12 col-lg-6 video-col2">
			<?php if( get_field('yellow_video_link_type') == 'youtube' ) { ?>
				<div class="videoWrapper">
					<?php echo get_field('yellow_youtube_link'); ?>
				</div>
			<?php } else { ?>
				<div class="videoWrapper">
					<video controls>
					  <source src="<?php echo get_field('yellow_video_link'); ?>" type="video/mp4">
						Your browser does not support the video tag.
					</video>

				</div>
			<?php } ?>
		</div>
	<?php } else { ?>

		<div class="col-xs-12 video-col1 video-col3" >
			<h2><?php echo get_field('yellow_heading'); ?></h2>
			<p><?php echo get_field('yellow_description'); ?></p>
			<a href="<?php echo get_field('yellow_button_link'); ?>"><button class="btn btn-red"><?php echo get_field('yellow_button_text'); ?></button></a>
		</div>

	<?php } ?>
	</div>
</div>
<div class="container">
	<div id='slide-in-content'>
<!--		FOR CARDS		-->
	</div>
</div>
<div id="blue-content" class="container-fluid">
	<div class="container">
	<?php if( get_field('blue_enable_video') == 'yes' ) { ?>
		<div class="col-xs-12 col-lg-6 video-col1" >
			<h2><?php echo get_field('blue_heading'); ?></h2>
			<?php echo get_field('blue_description'); ?>
			<a href="<?php echo get_field('blue_button_link'); ?>"><button class="btn btn-red"><?php echo get_field('blue_button_text'); ?></button></a>
		</div>
		<div class="col-xs-12 col-lg-6 video-col2">
			<?php if( get_field('blue_video_link_type') == 'youtube' ) { ?>
				<div class="videoWrapper">
					<?php echo get_field('blue_youtube_link'); ?>
				</div>
			<?php } else { ?>
				<div class="videoWrapper">
					<video controls>
					  <source src="<?php echo get_field('blue_video_link'); ?>" type="video/mp4">
						Your browser does not support the video tag.
					</video>

				</div>
			<?php } ?>
		</div>
	<?php } else { ?>

		<div class="col-xs-12 video-col1 video-col3" >
			<h2><?php echo get_field('blue_heading'); ?></h2>
			<?php echo get_field('blue_description'); ?>
			<a href="<?php echo get_field('blue_button_link'); ?>"><button class="btn btn-red"><?php echo get_field('blue_button_text'); ?></button></a>
		</div>

	<?php } ?>
	</div>
</div>

</div><!-- Wrapper end -->

<?php get_footer(); ?>
