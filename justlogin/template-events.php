<?php
/**
 * Template Name: Events Page
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
	jQuery('body').addClass('page-id-884');
</script>
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


	<!--	Start of Featured Events		-->
	<?php
	// args
	$args = array(
		'numberposts'	=> -1,
		'post_type'		=> 'events',
		'meta_key'		=> 'featured_events',
		'meta_value'	=> 'yes'
	);


	// query
	$the_query = new WP_Query( $args );

	?>
	<?php if( $the_query->have_posts() ): ?>
		<div id="featured-slider">
		<?php while( $the_query->have_posts() ) : $the_query->the_post();
			//Feature IMAGE
			$link = get_field('event_link');
				if ( has_post_thumbnail() ) {
					echo '<div class="featured-event-image"><a href="'.$link.'" target="_blank">';
					the_post_thumbnail("full");
					echo '</a></div>';
				}
			?>
			<div class="row featured-row">
				<div class="featured-col-1 col-md-8 col-lg-9 col-xl-10">
					<p class="featured-title"><a target="_blank" href="<?php echo get_field('event_link'); ?>"><?php the_title(); ?></a></p>
					<p class="featured-excerpt"><?php echo get_the_excerpt(); ?></p>

				</div>
				<div class="featured-col-2 col-md-4 col-lg-3 col-xl-2">
					<div class="featured-info">
						<a target="_blank" href="<?php echo get_field('event_link'); ?>"><?php _e('When:','justlogin'); ?> <?php echo get_field('date'); ?></a>
						</br><a target="_blank" href="<?php echo get_field('event_link'); ?>"><?php _e('Where:','justlogin'); ?> <?php echo get_field('city'); ?></a>
					</div>
				</div>
			</div>

		<?php endwhile; ?>
		</div>
	<?php endif; ?>



	<?php wp_reset_query();	 // Restore global post data stomped by the_post(). ?>
	<!--	End of Featured Events		-->

	<div class="row">
		<div class="col-8 col-sm-5 col-md-4 col-lg-3 col-xl-2 event-type">
			<p><?php _e('Upcoming Events','justlogin'); ?></p>
		</div>
		<div class="col-4 col-sm-7 col-md-8 col-lg-9 col-xl-10 solid-midline-col">
			<div class="solid-midline"></div>
		</div>
	</div>

	<!--	Start of Upcoming Events		-->
	<?php
	// Query Recent Events
	// args
	$today = date("Ymd");
	$args = array(
		'numberposts'	=> -1,
		'post_type'		=> 'events',
		'orderby'   => 'date',
        'order' => 'DESC',
//		'meta_key'		=> 'upcoming-recent',
//		'meta_value'	=> 'upcoming'
		'meta_key' => 'date',
		'meta_query' => array(
			array(
			   'key' => 'date',
			   'meta-value' => date('Ymd'),
			   'value' => $today,
			   'compare' => '>=',
			   'type' => 'CHAR'
		   ))
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
				if ( has_post_thumbnail() ) {
					echo '<p class="result-thumbnail"><a target="_blank" href="';
					echo get_field('event_link');
					echo '">';
					the_post_thumbnail("medium");
					echo '</a></p>';
				}
			?>
			<div class="result-content">
				<div>
			<!--<p><?php the_category(); ?></p>-->
				<p class="result-category"><a target="_blank" href="<?php echo get_field('event_link'); ?>"><?php the_title(); ?></a></p>
				<p class="result-date"><?php echo get_the_date(); ?></p>
			<!--<p><?php the_tags(); ?></p>-->
				<div class="result-title"><a target="_blank" href="<?php echo get_field('event_link'); ?>"><?php _e('Date:','justlogin'); ?> <?php echo get_field('date'); ?></a>
					</br><a target="_blank" href="<?php echo get_field('event_link'); ?>"><?php _e('Time:','justlogin'); ?> <?php echo get_field('time'); ?> SGT (UCT+8)</a>
				</br><a target="_blank" href="<?php echo get_field('event_link'); ?>"><?php _e('City:','justlogin'); ?> <?php echo get_field('city'); ?></a></div>
				</div>
				<p class="result-read"><a target="_blank" href="<?php echo get_field('event_link'); ?>"><?php _e('Read More','justlogin'); ?> ></a></p>
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
			<p><?php _e('Recent Events','justlogin'); ?></p>
		</div>
		<div class="col-4 col-sm-7 col-md-8 col-lg-9 col-xl-10 solid-midline-col">
			<div class="solid-midline"></div>
		</div>
	</div>

	<!--	Start of Recent Events		-->
	<?php
	// Query Recent Events
	// args
	$today = date("Ymd");
	$args = array(
		'numberposts'	=> -1,
		'post_type'		=> 'events',
		'orderby'   => 'date',
        'order' => 'DESC',
//		'meta_key'		=> 'upcoming-recent',
//		'meta_value'	=> 'recent'
		'meta_key' => 'date',
		'meta_query' => array(
			array(
			   'key' => 'date',
			   'meta-value' => date('Ymd'),
			   'value' => $today,
			   'compare' => '<',
			   'type' => 'CHAR'
		   ))
	);
	$the_query = new WP_Query( $args );

	?>
	<?php if( $the_query->have_posts() ): ?>

	<div id="recent-slider" class="result-row" style="display: block;">
		<div class="carousel multiple-items" style="display: block;">
		<?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
			<div class="item result-col" style="display: block;">


		<!--<p><br /><?php //the_excerpt(); ?></p>-->
			<?php
				if ( has_post_thumbnail() ) {
					echo '<p class="result-thumbnail"><a target="_blank" href="';
					echo get_field('event_link');
					echo '">';
					the_post_thumbnail("medium");
					echo '</a></p>';
				}
			?>
			<div class="result-content">
				<div>
			<!--<p><?php //the_category(); ?></p>-->
				<p class="result-category"><a target="_blank" href="<?php echo get_field('event_link'); ?>"><?php the_title(); ?></a></p>
				<p class="result-date"><?php echo get_the_date(); ?></p>
			<!--<p><?php //the_tags(); ?></p>-->
				<div class="result-title"><a target="_blank" href="<?php echo get_field('event_link'); ?>"><?php _e('Date:','justlogin'); ?> <?php echo get_field('date'); ?></a>
					</br><a target="_blank" href="<?php echo get_field('event_link'); ?>"><?php _e('Time:','justlogin'); ?> <?php echo get_field('time'); ?> SGT (UCT+8)</a>
				</br><a target="_blank" href="<?php echo get_field('event_link'); ?>"><?php _e('City:','justlogin'); ?> <?php echo get_field('city'); ?></a></div>
				</div>
				<p class="result-read"><a target="_blank" href="<?php echo get_field('event_link'); ?>"><?php _e('Read More','justlogin'); ?> ></a></p>
			</div>


		</div>
		<?php endwhile; ?>
		</div>
	</div>
	<?php endif; ?>

	<?php wp_reset_query();	 // Restore global post data stomped by the_post(). ?>
	<!--	End of Recent Posts		-->

<!--	<div id="mailchimp-insert" style="display: none;">-->
	<div id="mailchimp-insert" >
		<!-- Begin MailChimp Signup Form -->
		<link href="//cdn-images.mailchimp.com/embedcode/classic-10_7.css" rel="stylesheet" type="text/css">
		<style type="text/css">
			#mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif; }
			/* Add your own MailChimp form style overrides in your site stylesheet or in this style block.
			   We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
		</style>
		<div id="mc_embed_signup">
		<form action="https://justlogin.us7.list-manage.com/subscribe/post?u=1dafb2d56ad5a6bf72a79971d&amp;id=518aeb22ac" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
			<div id="mc_embed_signup_scroll">

		<div class="indicates-required"><span class="asterisk"></span></div>
		<div class="mc-field-group">
			<label for="mce-EMAIL"><span class="asterisk"></span>
		</label>
			<input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL" placeholder="Email">
		</div>
			<div id="mce-responses" class="clear">
				<div class="response" id="mce-error-response" style="display:none"></div>
				<div class="response" id="mce-success-response" style="display:none"></div>
			</div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
			<div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_1dafb2d56ad5a6bf72a79971d_518aeb22ac" tabindex="-1" value=""></div>
			<div id="submit-button" class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button btn-red"></div>
			</div>
		</form>
		</div>
		<script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';fnames[3]='LEADSOURCE';ftypes[3]='text';fnames[4]='COUNTRY';ftypes[4]='text';fnames[6]='COMPANY';ftypes[6]='text';fnames[5]='LEADSTATUS';ftypes[5]='text';fnames[7]='ACCOUNT';ftypes[7]='text';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
		<!--End mc_embed_signup-->

	</div>
</div><!-- Container end -->
</div><!-- Wrapper end -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.js"></script>
<script type="text/javascript">

	jQuery(document).on('ready', function () {
		jQuery('.featured-excerpt').each(function() {
			console.log(jQuery(this).text());
			var text = jQuery(this).text().replace('[...]', '');
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
					  speed: 300,
					  rows: 1,
					  slidesToShow: 3,
					  nextArrow: '<button type="button" class="slick-next"><i class="fas fa-chevron-right"></i></button>',
					  prevArrow: '<button type="button" class="slick-prev"><i class="fas fa-chevron-left"></i></button>',
//					  slidesToScroll: 3,
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
