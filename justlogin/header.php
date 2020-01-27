<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */

$container = get_theme_mod( 'understrap_container_type' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<!-- Google Tag Manager -->
	<!--
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-MN8WFJT');</script>
-->
<!-- End Google Tag Manager -->
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-title" content="<?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description' ); ?>">
	<?php if($_GET["lang"]=='zh-hant') { ?>
		<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/redirect1-chinese.js"></script>
	<?php } else { ?>
		<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/redirect1.js"></script>
	<?php } ?>
	<link rel="icon" href="<?php echo get_stylesheet_directory_uri() ?>/img/favicon.ico" type="image/ico" sizes="16x16">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri() ?>/css/siang.css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri() ?>/css/zh.css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri() ?>/css/client.css">
	
<?php 
	    $current_page = $_SERVER['REQUEST_URI'];
	    //$parts = explode('/', $current_page);
	    if ($_SERVER['REQUEST_URI'] == "https://justlogin.com" || $_SERVER['REQUEST_URI'] == "https://hk.justlogin.com" || $_SERVER['REQUEST_URI'] == "https://mm.justlogin.com")
	    {
	        $current_page = substr($current_page, 3);
	    }
		  
		  $current_page = str_replace("zh-hant/","",$current_page);
		  $current_page = str_replace("my/","",$current_page);
	?>
	
<link rel="alternate" hreflang="x-default" href="https://mm.justlogin.com<?php echo $current_page; ?>">		
<link rel="alternate" hreflang="en-HK" href="https://hk.justlogin.com<?php echo $current_page; ?>">		
<link rel="alternate" hreflang="zh-HK" href="https://hk.justlogin.com/zh-hant<?php echo $current_page; ?>">		
<link rel="alternate" hreflang="en-SG" href="https://justlogin.com<?php echo $current_page; ?>">		
<link rel="alternate" hreflang="my-MM" href="https://mm.justlogin.com/my<?php echo $current_page; ?>">		
<link rel="alternate" hreflang="en-MM" href="https://mm.justlogin.com<?php echo $current_page; ?>">
	

</head>

<body <?php body_class(); ?>>
	<!-- Google Tag Manager (noscript) -->
	<!--
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MN8WFJT"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript> -->
<!-- End Google Tag Manager (noscript) -->
	<div class="container">

	</div>
<div class="hfeed site" id="page">

	<!-- ******************* The Navbar Area ******************* -->
	<div id="wrapper-navbar" itemscope itemtype="http://schema.org/WebSite">

		<a class="skip-link screen-reader-text sr-only" href="#content"><?php esc_html_e( 'Skip to content', 'understrap' ); ?></a>

		<nav class="navbar navbar-expand-md navbar-dark bg-white">

		<?php /*?><?php if ( 'container' == $container ) : ?>
			<div class="container" >
		<?php endif; ?><?php */?>
			<div class=" container nav-container">
					<!-- Your site title as branding in the menu -->
					<?php if ( ! has_custom_logo() ) { ?>

						<?php if ( is_front_page() && is_home() ) : ?>

							<h1 class="navbar-brand mb-0"><a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a></h1>

						<?php else : ?>

							<a class="navbar-brand" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a>

						<?php endif; ?>


					<?php } else {
						the_custom_logo();
					} ?><!-- end custom logo -->




				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"><i class="fas fa-bars"></i></span>
				</button>

				<!-- The WordPress Menu goes here -->
				<?php wp_nav_menu(
					array(
						'theme_location'  => 'primary',
						'container_class' => 'collapse navbar-collapse',
						'container_id'    => 'navbarNavDropdown',
						'menu_class'      => 'navbar-nav',
						'fallback_cb'     => '',
						'menu_id'         => 'main-menu',
						'walker'          => new understrap_WP_Bootstrap_Navwalker(),
					)
				);
				?>

				<!--sign up-->

<!-- 				<button id="sign-up" type="button" class="btn btn-purple">Sign in</button>
				<div id="header-free">
					<a href="<?php echo get_site_url(); ?>/free-trial-sign-up/">Free Trial</a>
				</div>
				<div id="nav-func">
					<div id="earth"></div>

				</div> -->


			<?php if ( 'container' == $container ) : ?>

			</div><!-- .container -->
		<?php endif; languages_list_footer();

		// echo '<li style="display:none;" id="language-menu-func-mobile" class="language-mobile special-menu-mobile menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-1373 shiftnav-sub-accordion shiftnav-depth-0">
		// <a class="shiftnav-target"  href="#">Language</a>
		// <span class="shiftnav-submenu-activation shiftnav-submenu-activation-open"><i class="fa fa-chevron-down"></i></span>
		// <span class="shiftnav-submenu-activation shiftnav-submenu-activation-close"><i class="fa fa-chevron-up"></i></span>
		// <ul class="sub-menu sub-menu-1">'
		//
		// echo '<li class="shiftnav-retract">
		// 	<a class="shiftnav-target"><i class="fa fa-chevron-left"></i></a>
		// 	</li>
		// 	</ul></li>';


		?>

		</nav><!-- .site-navigation -->
		<script>
			(function($){
			// Custom Language Menu
			jQuery(".free-trial-menu").after(jQuery('#language-menu-func'));
			jQuery('#language-menu-func').css('display','block');
			jQuery(window).on("load",function(){
				jQuery(".free-trial-mobile").after(jQuery('#language-menu-func-mobile'));

				jQuery('#language-menu-func-mobile').css('display','block');
			});

			$("#language-menu-func .dropdown-menu").append($(".add-lang-div .menu-item"));
			$("#language-menu-func-mobile .sub-menu").append($(".add-lang-div-mobile .menu-item"));

		})(jQuery);



		</script>
	</div><!-- #wrapper-navbar end -->
