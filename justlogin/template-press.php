<?php
/**
 * Template Name: Press Page
 *
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 * Text Domain: justlogin
 * @package understrap
 */

get_header();

$container   = get_theme_mod( 'understrap_container_type' );

?>
<!--
<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri() ?>/css/owl.carousel.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri() ?>/css/owl.theme.default.min.css">
-->
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>

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


	<div class="row">
		<div class="col-8 col-sm-5 col-md-4 col-lg-3 col-xl-2 event-type">
			<p><?php _e('Press Coverage','justlogin'); ?></p>
		</div>
		<div class="col-4 col-sm-7 col-md-8 col-lg-9 col-xl-10 solid-midline-col">
			<div class="solid-midline"></div>
		</div>
	</div>

	<!--	Start of Upcoming Events		-->
	<?php
	// Query Recent Events
	// args
	$args = array(
		'numberposts'	=> -1,
		'post_type'		=> 'press',
		'meta_query' => array(
			array(
				'key' => 'press_type', // name of custom field
				'value' => '"coverage"', // matches exactly
				'compare' => 'LIKE'
			)
		)
	);
	$the_query = new WP_Query( $args );

	?>
	<?php if( $the_query->have_posts() ): ?>

	<div id="upcoming-slider" class="result-row" style="display: block;">
		<div class="carousel multiple-items" style="display: block;">
		<?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
			<div class="item result-col" style="display: block;">


		<!--<p><br /><?php the_excerpt(); ?></p>-->
			<?php
				if ( get_field('press_enable_link') == "yes") {
					$presspermalink = get_field('press_link_url');
				} else {
					$presspermalink  = get_permalink();
				}
				if ( has_post_thumbnail() ) {
					echo '<p class="result-thumbnail"><a target="_blank" href="';
					echo $presspermalink;
					echo '">';
					the_post_thumbnail("medium");
					echo '</a></p>';
				}
			?>
			<div class="result-content">
				<div>
			<!--<p><?php the_category(); ?></p>-->
				<div class="result-category"><a target="_blank" href="<?php echo $presspermalink; ?>"><?php the_title(); ?></a></div>
				<p class="result-date"><?php echo get_the_date(); ?></p>
			<!--<p><?php the_tags(); ?></p>-->
				<div class="result-title">
				</div>
				</div>
				<p class="result-read"><a target="_blank" href="<?php echo $presspermalink; ?>">Read More ></a></p>
			</div>


		</div>
		<?php endwhile; ?>
		</div>
	</div>
	<?php endif; ?>

	<?php wp_reset_query();	 // Restore global post data stomped by the_post(). ?>
	<!--	End of Upcoming Events		-->

	<div class="row">
		<div class="col-8 col-sm-5 col-md-4 col-lg-3 col-xl-2 event-type">
			<p><?php _e('Press Release','justlogin'); ?></p>
		</div>
		<div class="col-4 col-sm-7 col-md-8 col-lg-9 col-xl-10 solid-midline-col">
			<div class="solid-midline"></div>
		</div>
	</div>

	<!--	Start of Recent Events		-->
	<?php
	// Query Recent Events
	// args
	$args = array(
		'numberposts'	=> -1,
		'post_type'		=> 'press',
		'meta_query' => array(
			array(
				'key' => 'press_type', // name of custom field
				'value' => '"release"', // matches exactly
				'compare' => 'LIKE'
			)
		)
	);
	$the_query = new WP_Query( $args );

	?>
	<?php if( $the_query->have_posts() ): ?>

	<div id="recent-slider" class="result-row" style="display: block;">
		<div class="carousel multiple-items" style="display: block;">
		<?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
			<div class="item result-col" style="display: block;">


			<?php
				if ( get_field('press_enable_link') == "yes") {
					$presspermalink = get_field('press_link_url');
				} else {
					$presspermalink  = get_permalink();
				}
				if ( has_post_thumbnail() ) {
					echo '<p class="result-thumbnail"><a target="_blank" href="';
					echo $presspermalink;
					echo '">';
					the_post_thumbnail("medium");
					echo '</a></p>';
				}
			?>
			<div class="result-content">
				<div>
				<p class="result-category"><a target="_blank" href="<?php echo $presspermalink; ?>"><?php the_title(); ?></a></p>
				<p class="result-date"><?php echo get_the_date(); ?></p>
				<div class="result-title"></div>
				</div>
				<p class="result-read"><a target="_blank" href="<?php echo $presspermalink; ?>">Read More ></a></p>
			</div>


		</div>
		<?php endwhile; ?>
		</div>
	</div>
	<?php endif; ?>

	<?php wp_reset_query();	 // Restore global post data stomped by the_post(). ?>
	<!--	End of Recent Posts		-->

	<div id="mailchimp-insert"></div>
</div><!-- Container end -->
</div><!-- Wrapper end -->
<div class="container-fluid water-row" style="background-image: url('<?php echo get_field('press_contact_bg'); ?>')">
	<div class="row" style="text-align: center;">
		<div class="h2font35 col-12"><?php echo get_field('press_heading'); ?></div>
		<div class="font18p col-12"><?php echo get_field('press_contact_message'); ?></div>
	</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.js"></script>
<script type="text/javascript">

	jQuery(document).on('ready', function () {
		jQuery('.featured-exerpt').each(function() {
			console.log(jQuery(this).text());
			var text = jQuery(this).text().replace('[...]', '...');
			jQuery(this).text(text);
		});
//		var sliders = {
//		  1: {slider : '.multiple-items1'},
//		  2: {slider : '.multiple-items'}
//		};

//		jQuery.each(sliders, function() {
		 var gadgetCarousel = jQuery(".carousel");

		  gadgetCarousel.each(function() {
			if (jQuery(this).is("#upcoming-slider .carousel")) {
				jQuery(this).slick({
				  dots: false,
				  infinite: false,
				  variableWidth: true,
					nextArrow: '<button type="button" class="slick-next"><i class="fas fa-chevron-right"></i></button>',
				  prevArrow: '<button type="button" class="slick-prev"><i class="fas fa-chevron-left"></i></button>',
				  speed: 300,
				  rows: 1,
				  slidesToShow: 4,
//				  slidesToScroll: 4,
				  responsive: [
					{
					  breakpoint: 1200,
					  settings: {
						slidesToShow: 3,
						slidesToScroll: 3
					  }
					},
					{
					  breakpoint: 992,
					  settings: {
						slidesToShow: 2,
						slidesToScroll: 2
					  }
					},
					{
					  breakpoint: 576,
					  settings: {
						slidesToShow: 1,
						slidesToScroll: 1,
//						  variableWidth: false,
					  }
					}
					// You can unslick at a given breakpoint now by adding:
					// settings: "unslick"
					// instead of a settings object
				  ]
			  });
			}
			else if (jQuery(this).is("#recent-slider .carousel")){
			  jQuery(this).slick({
				  dots: false,
				  infinite: false,
				  variableWidth: true,
					nextArrow: '<button type="button" class="slick-next"><i class="fas fa-chevron-right"></i></button>',
				  prevArrow: '<button type="button" class="slick-prev"><i class="fas fa-chevron-left"></i></button>',
				  speed: 300,
				  rows: 1,
				  slidesToShow: 4,
//				  slidesToScroll: 4,
				  responsive: [
					{
					  breakpoint: 1200,
					  settings: {
						slidesToShow: 3,
						slidesToScroll: 3
					  }
					},
					{
					  breakpoint: 992,
					  settings: {
						slidesToShow: 2,
						slidesToScroll: 2
					  }
					},
					{
					  breakpoint: 576,
					  settings: {
						slidesToShow: 1,
						slidesToScroll: 1,
//						  variableWidth: false,
					  }
					}
					// You can unslick at a given breakpoint now by adding:
					// settings: "unslick"
					// instead of a settings object
				  ]});
			}
			else {
			  jQuery(this).slick();
			}
//            jQuery(this.slider).slick({
//
//            });
//			jQuery(this.slider).slick({
//
//				});
			jQuery('.slick-next').html('<i class="fas fa-chevron-right"></i>');
			jQuery('.slick-prev').html('<i class="fas fa-chevron-left"></i>');
        });
	});
</script>
<?php get_footer(); ?>
