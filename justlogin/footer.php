<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

$the_theme = wp_get_theme();
$container = get_theme_mod( 'understrap_container_type' );
?>

<?php get_sidebar( 'footerfull' ); ?>

<div class="wrapper" id="wrapper-footer">
	<div id="footer-free"><a href="<?php echo get_site_url(); ?>/free-trial-sign-up/"><span>FREE</span> <span>TRIAL</span></a></div>
	<div class="<?php echo esc_attr( $container ); ?>">

		<div class="row">

			<div class="col-md-12">

				<footer class="site-footer" id="colophon">

					<div class="site-info">
						<p class="love-sing"><?php _e('Made with','justlogin'); ?> <img src="<?php echo get_site_url(); ?>/wp-content/uploads/2018/07/footer-logo-love@2x.png" alt=""> <?php _e('in Singapore.','justlogin'); ?></p>
						<hr>

						<div class="row copyright">
							<div class="col-md-6">
								<p>
									<?php if( have_rows('social_icons', 'option') ): ?>
									<?php while( have_rows('social_icons', 'option') ): the_row(); ?>
									<a href="<?php the_sub_field('social_icon_url'); ?>"><img class="" src="<?php the_sub_field('social_icon_image_url'); ?>" alt=""></a>


									<?php endwhile; ?>


								<?php endif; ?>
								<span><?php _e('Copyright','justlogin'); ?> &copy; <?php _e(date("Y") . ' JustLogin Pte Ltd. All Rights Reserved.','justlogin'); ?></span></p>
							</div>
							<div class="policy col-md-6">
								<p>
									<a href="<?php echo get_field('privacy_policy_url','option') ?>"><?php _e('Privacy Policy','justlogin'); ?></a> | <a href="<?php echo get_field('personal_data_protection_act_url','option') ?>"><?php _e('Personal Data Protection Act','justlogin'); ?></a> | <a href="<?php echo get_field('terms_of_service_agreement_url','option') ?>"><?php _e('Terms of Service Agreement','justlogin'); ?></a></p>
							</div>
						</div>

							<!--<a href="<?php  echo esc_url( __( 'http://wordpress.org/','understrap' ) ); ?>"><?php printf(
							/* translators:*/
							esc_html__( 'Proudly powered by %s', 'understrap' ),'WordPress' ); ?></a>
								<span class="sep"> | </span>

							<?php printf( // WPCS: XSS ok.
							/* translators:*/
								esc_html__( 'Theme: %1$s by %2$s.', 'understrap' ), $the_theme->get( 'Name' ),  '<a href="'.esc_url( __('http://understrap.com', 'understrap')).'">understrap.com</a>' ); ?>

							(<?php printf( // WPCS: XSS ok.
							/* translators:*/
								esc_html__( 'Version: %1$s', 'understrap' ), $the_theme->get( 'Version' ) ); ?>)-->
					</div><!-- .site-info -->

				</footer><!-- #colophon -->

			</div><!--col end -->

		</div><!-- row end -->

	</div><!-- container end -->

</div><!-- wrapper end -->

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>
<script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
<script>var jQuery_3_3_1 = $.noConflict(true);</script>
<!--
<script
  src="https://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>
<script>var jQuery_2_2_4 = $.noConflict(true);</script>
-->
<!--<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/owl.carousel.min.js"></script>-->
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/zh.js"></script>

</body>

</html>
