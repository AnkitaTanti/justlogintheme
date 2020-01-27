<?php
/**
 * Template Name: Blog Page
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

  <?php if($_GET["lang"]=='zh-hant') { ?>
    	<div><?php echo do_shortcode('[searchandfilter id="2405"]'); ?></div>
    	<div id="blog-search"><?php echo do_shortcode('[searchandfilter id="2405" show="results"]'); ?></div>
  <?php } else { ?>
      <div><?php echo do_shortcode('[searchandfilter id="719"]'); ?></div>
    	<div id="blog-search"><?php echo do_shortcode('[searchandfilter id="719" show="results"]'); ?></div>
  <?php } ?>

	<div id="mailchimp-insert">
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
<script>
<?php if($_GET["lang"]=='zh-hant') { ?>
//Blogs & Knowledge Hub All catergories
jQuery(".searchandfilter ul li li.sf-item-0 label").html('全部');
<?php } else { ?>
jQuery(".searchandfilter ul li li.sf-item-0 label").html('All');
<?php } ?>
</script>
<?php get_footer(); ?>
