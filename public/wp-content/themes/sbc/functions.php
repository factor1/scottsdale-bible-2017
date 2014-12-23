<?php

// Custom shortcodes by factor1
include(get_template_directory().'/shortcode_maker.php');

// Add RSS links to <head> section
	automatic_feed_links();
	
// Load jQuery
	if ( !is_admin() ) {
	   wp_deregister_script('jquery');
	   wp_register_script('jquery', ("//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"), false);
	   wp_enqueue_script('jquery');
	}
	
//Customize Wordpress Admin

	// add login logo
	function custom_loginlogo() {
	echo '<style type="text/css">
	h1 a {
		height: 100% !important; 
		width:100% !important;
		background-image: url('.get_bloginfo('template_directory').'/images/logo-login.png) !important;
		background-postion-x: center !important;
		background-size:100% !important; 
		margin-bottom:10px !important; }
	
	h1 {
		width: 320px !important; 
		Height: 120px !important}
		
	</style>';
	}
	
	add_action('login_head', 'custom_loginlogo');
	
	
	// add custom footer text
	function modify_footer_admin () {
		echo 'Created by <a href="http://factor1studios.com">factor1</a>.';
		echo 'Powered by<a href="http://WordPress.org">WordPress</a>.';
		}

	add_filter('admin_footer_text', 'modify_footer_admin');


	register_nav_menus( array(
		'primary' => __( 'Primary Navigation', 'f1' )
	) );




// add page excerpts
	function page_excerpt() {
	add_post_type_support('page', array('excerpt'));
	}
	add_action('init', 'page_excerpt');


// Set featured image sizes
if ( function_exists('add_theme_support') )
add_theme_support('post-thumbnails');
add_image_size( 'page-feature', 642, 360, true ); // Page Featured Banner



// build header information
	add_action( 'wp_head', 'f1_head' );
	function f1_head() {
	?>
	<meta name="author" content="Factor1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	
	<?php
	}


register_sidebar( array(
		'name' => __( 'Page Sidebar', 'f1' ),
		'id' => 'page-sidebar',
		'description' => __( 'The primary widget area on the right side', 'f1' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="widgettitle">',
		'after_title' => '</h2>',
	) );
	


// Build the breadcrumb menus
function wordpress_breadcrumbs() {
 
  $delimiter = '&raquo;';
  $name = 'Home'; //text for the 'Home' link
  $currentBefore = '<span class="current">';
  $currentAfter = '</span>';
 
  if ( !is_home() && !is_front_page() || is_paged() ) {
 
    echo '<div id="crumbs">';
 
    global $post;
    $home = get_bloginfo('url');
    echo '<a href="' . $home . '">' . $name . '</a> ' . $delimiter . ' ';
 
    if ( is_category() ) {
      global $wp_query;
      $cat_obj = $wp_query->get_queried_object();
      $thisCat = $cat_obj->term_id;
      $thisCat = get_category($thisCat);
      $parentCat = get_category($thisCat->parent);
      if ($thisCat->parent != 0) echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
      echo $currentBefore . 'Archive by category &#39;';
      single_cat_title();
      echo '&#39;' . $currentAfter;
 
    } elseif ( is_day() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
      echo $currentBefore . get_the_time('d') . $currentAfter;
 
    } elseif ( is_month() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo $currentBefore . get_the_time('F') . $currentAfter;
 
    } elseif ( is_year() ) {
      echo $currentBefore . get_the_time('Y') . $currentAfter;
 
    } elseif ( is_single() ) {
      $cat = get_the_category(); $cat = $cat[0];
      echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
      echo $currentBefore;
      the_title();
      echo $currentAfter;
 
    } elseif ( is_page() && !$post->post_parent ) {
      echo $currentBefore;
      the_title();
      echo $currentAfter;
 
    } elseif ( is_page() && $post->post_parent ) {
      $parent_id  = $post->post_parent;
      $breadcrumbs = array();
      while ($parent_id) {
        $page = get_page($parent_id);
        $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
        $parent_id  = $page->post_parent;
      }
      $breadcrumbs = array_reverse($breadcrumbs);
      foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
      echo $currentBefore;
      the_title();
      echo $currentAfter;
 
    } elseif ( is_search() ) {
      echo $currentBefore . 'Search results for &#39;' . get_search_query() . '&#39;' . $currentAfter;
 
    } elseif ( is_tag() ) {
      echo $currentBefore . 'Posts tagged &#39;';
      single_tag_title();
      echo '&#39;' . $currentAfter;
 
    } elseif ( is_author() ) {
       global $author;
      $userdata = get_userdata($author);
      echo $currentBefore . 'Articles posted by ' . $userdata->display_name . $currentAfter;
 
    } elseif ( is_404() ) {
      echo $currentBefore . 'Error 404' . $currentAfter;
    }
 
    if ( get_query_var('paged') ) {
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
      echo __('Page') . ' ' . get_query_var('paged');
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
    }
 
    echo '</div>';
 
  }
}


// make TinyMCE allow iframes
	add_filter( 'tiny_mce_before_init', create_function( '$a', '$a["extended_valid_elements"] = "iframe[id|class|title|style|align|frameborder|height|longdesc|marginheight|marginwidth|name|scrolling|src|width]"; return $a;' ) );




 ?>
