<?php
/**
 * Understrap functions and definitions
 *
 * @package understrap
 */

/**
 * Initialize theme default settings
 */
require get_template_directory() . '/inc/theme-settings.php';

/**
 * Theme setup and custom theme supports.
 */
require get_template_directory() . '/inc/setup.php';

/**
 * Register widget area.
 */
require get_template_directory() . '/inc/widgets.php';

/**
 * Enqueue scripts and styles.
 */
require get_template_directory() . '/inc/enqueue.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom pagination for this theme.
 */
require get_template_directory() . '/inc/pagination.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Custom Comments file.
 */
require get_template_directory() . '/inc/custom-comments.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load custom WordPress nav walker.
 */
require get_template_directory() . '/inc/bootstrap-wp-navwalker.php';

/**
 * Load WooCommerce functions.
 */
require get_template_directory() . '/inc/woocommerce.php';

/**
 * Load Editor functions.
 */
require get_template_directory() . '/inc/editor.php';

//function custom_rewrite_rule() {
//    add_rewrite_rule('^blog-categories/(.*)','/blog/?_sft_blog_categories=$matches[1]','top');
//}
//add_action('init', 'custom_rewrite_rule', 10, 0);


//RewriteRule ^blog-categories/(.*)$ /blog/?_sft_blog_categories=$1 [QSA,L]
//RewriteRule ^homme/(.*)$ /blog/homee=$1 [QSA,L]

// Function to add red and purple column
  function red_purple_shortcode() {
    if(get_field('activate_purple_column')=='yes'){
    return '
	<div class="container-fluid" id="home-row7">
		<div class="row">
			<div class="col-md-6" id="home-row7-col1" style="background: url('.get_field( "red_column_bg" ).'); background-size: 101% 101%;">
				<div class="pull-right">
					<h2>'.get_field( "red_column_title" ).'</h2>
					<p>'.get_field( "red_column_text" ).'</p>
					<div class="btn btn-red btn-red2"><a class="btn-reda" href="'.get_field( "red_column_button_link" ).'" style="width: 100%;">'.get_field( "red_column_button_text" ).'</a></div>
				</div>
			</div>
			<div class="col-md-6" id="home-row7-col2" style="background: url('.get_field( "purple_column_bg" ).'); background-size: 101% 101%;">
				<div class="pull-left">
					<h2>'.get_field( "purple_column_title" ).'</h2>
					<p>'.get_field( "purple_column_text" ).'</p>
					<div class="btn btn-red btn-red2"><a class="btn-reda" href="'.get_field( "purple_column_button_link" ).'" style="width: 100%;">'.get_field( "purple_column_button_text" ).'</a></div>
				</div>
			</div>
		</div>
	</div>
	';
  } else {
    return '
	<div class="container-fluid" id="home-row7">
		<div class="row">
			<div class="col-md-12" id="home-row7-col1" style="background: url('.get_field( "red_column_bg" ).'); background-size: 101% 101%;">
				<div class="pull-right" style="max-width: 1000px; margin: 0 auto; text-align: center; padding: 0 15px;">
					<h2>'.get_field( "red_column_title" ).'</h2>
					<p>'.get_field( "red_column_text" ).'</p>
					<div class="btn btn-red btn-red2"><a class="btn-reda" href="'.get_field( "red_column_button_link" ).'" style="width: 100%;">'.get_field( "red_column_button_text" ).'</a></div>
				</div>
			</div>

		</div>
	</div>
	';
  }
}
add_shortcode('red_purple_columns', 'red_purple_shortcode');

if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Footer Socials',
		'menu_title'	=> 'Footer Socials',
		'menu_slug' 	=> 'footer-socials-settings',
		'redirect'		=> false
	));

	acf_add_options_page(array(
		'page_title' 	=> '404 Page',
		'menu_title'	=> '404 Page',
		'menu_slug' 	=> '404-settings',
		'redirect'		=> false
	));
	
	acf_add_options_page(array(
		'page_title' 	=> 'Language Menu Addon Options',
		'menu_title'	=> 'Language Menu Addon Options',
		'menu_slug' 	=> 'language-menu-option-acf',
		'redirect'		=> false
	));
}

function languages_list_footer(){
    $languages = icl_get_languages('skip_missing=0&orderby=code');
    if(!empty($languages)){
      //DESKTOP LANGUAGE MENU START
        echo '<li style="display:none;" id="language-menu-func" class="language-menu menu-item menu-item-type-custom menu-item-1767 menu-item-object-custom menu-item-has-children nav-item dropdown"><a title="Language" href="#" data-toggle="dropdown" class="nav-link dropdown-toggle">Language <span class="caret"></span></a><ul class=" dropdown-menu" role="menu">';
        foreach($languages as $l){
            echo '<li id="menu-item-1882" class="menu-item menu-item-1882 menu-item-type-custom menu-item-object-custom nav-item">';
            // if($l['country_flag_url']){
            //     if(!$l['active']) echo '<a class="nav-link" href="'.$l['url'].'">';
            //     echo '<img src="'.$l['country_flag_url'].'" height="12" alt="'.$l['language_code'].'" width="18" />';
            //     if(!$l['active']) echo '</a>';
            // }
            if(!$l['active']) {
              echo '<a class="nav-link" href="'.$l['url'].'">';
            } else {
              echo '<a class="nav-link" href="#">';
            }
            // echo icl_disp_language($l['native_name'], $l['translated_name']);
            echo icl_disp_language($l['translated_name']);
            echo '</a>';
            echo '</li>';
        }
        echo '</ul></li>';

        //MOBILE LANGUAGE MENU START
        // if($_GET["lang"]=='zh-hant') {
        // echo '<li style="display:none;" id="language-menu-func-mobile" class="language-mobile special-menu-mobile menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-1373 shiftnav-sub-accordion shiftnav-depth-0">
        // <a class="shiftnav-target"  href="#">語言</a>
    		// <span style="height:50px;" class="shiftnav-submenu-activation shiftnav-submenu-activation-open"><i class="fa fa-chevron-down"></i></span>
    		// <span style="height:50px;" class="shiftnav-submenu-activation shiftnav-submenu-activation-close"><i class="fa fa-chevron-up"></i></span>
        // <ul class="sub-menu">';
        // } else {

        echo '<li style="display:none;" id="language-menu-func-mobile" class="language-mobile special-menu-mobile menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-1373 shiftnav-sub-accordion shiftnav-depth-0">
        <a class="shiftnav-target change-menu-text"  href="#">'.get_field("language_menu_text_edit","option").'</a>
    		<span style="height:50px;" class="shiftnav-submenu-activation shiftnav-submenu-activation-open"><i class="fa fa-chevron-down"></i></span>
    		<span style="height:50px;" class="shiftnav-submenu-activation shiftnav-submenu-activation-close"><i class="fa fa-chevron-up"></i></span>
        <ul class="sub-menu">';
        // }

          foreach($languages as $l){
              echo '<li id="menu-item-1374" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1374 shiftnav-depth-1">';
              // if($l['country_flag_url']){
              //     if(!$l['active']) echo '<a class="nav-link" href="'.$l['url'].'">';
              //     echo '<img src="'.$l['country_flag_url'].'" height="12" alt="'.$l['language_code'].'" width="18" />';
              //     if(!$l['active']) echo '</a>';
              // }
              if(!$l['active']) {
                echo '<a class="shiftnav-target" href="'.$l['url'].'">';
              } else {
                echo '<a class="shiftnav-target" href="#">';
              }
              // echo icl_disp_language($l['native_name'], $l['translated_name']);
              echo icl_disp_language($l['translated_name']);
              echo '</a>';
              echo '</li>';
          }
          echo '
          <li class="shiftnav-retract">
      		<a class="shiftnav-target"><i class="fa fa-chevron-left"></i></a>
      		</li>
          </ul></li>';
    }
	ob_start(); ?>
     <div class="add-lang-div" style="display:none;">
     <?php

      // check if the repeater field has rows of data
      if( have_rows('additional_menu_item','option') ):

       	// loop through the rows of data
          while ( have_rows('additional_menu_item','option') ) : the_row(); ?>
          <li id="menu-item-1882" class="menu-item menu-item-1882 menu-item-type-custom menu-item-object-custom nav-item">
            <a class="nav-link" href="<?php echo get_sub_field('add_lang_menu_link','option'); ?>"><?php echo get_sub_field('add_lang_menu_name','option'); ?></a>
          </li>
          <?php endwhile;
      endif; ?>
      </div>

      <div class="add-lang-div-mobile" style="display:none;">
      <?php

       // check if the repeater field has rows of data
       if( have_rows('additional_menu_item','option') ):

        	// loop through the rows of data
           while ( have_rows('additional_menu_item','option') ) : the_row(); ?>
            <li id="menu-item-1374" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-1374 shiftnav-depth-1">
              <a class="shiftnav-target" href="<?php echo get_sub_field('add_lang_menu_link','option'); ?>"><?php echo get_sub_field('add_lang_menu_name','option'); ?></a>
            </li>
           <?php endwhile;
       endif;  ?>
       </div>
      <?php $my_add_lang = ob_get_clean();
    echo $my_add_lang;
}
