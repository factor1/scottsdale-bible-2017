<?php

define("THEME_PREFIX","sb_");
define("THEME_TIMEZONE","America/Phoenix");


date_default_timezone_set(THEME_TIMEZONE);

require_once("lib/factor1/bootstrap.php");
require_once("lib/factor1/cookies.php");

Use shortcodes\ShortcodeMaker;

if(!function_exists("sb_template_init"))
{
    function sb_template_init()
    {
        $ShortcodeMaker = new ShortcodeMaker();

        /* Strip P and BR tags for shortcodes */

        remove_filter('the_content','wpautop');
        add_filter('the_content','wpautop',12);


        /* Custom Login Logo */
        add_action('login_head',function() {
            echo    "<style type=\"text/css\">".
                            "h1 a".
                            "{".
                                "height: 100% !important;".
                                "width:100% !important;".
                                "background-image: url(".get_template_directory_uri()."/images/logo-login.png) !important;".
                                "background-postion-x: center !important;".
                                "background-size:100% !important;".
                                "margin-bottom:10px !important;".
                            "}".
                            "h1".
                            "{".
                                "width: 320px !important;".
                                "Height: 120px !important".
                            "}".
                            "</style>";
        });

        /* Admin Footer Text */
        add_filter('admin_footer_text',function() {
            echo    'Created by <a href="http://factor1studios.com">factor1</a>.'.
                        'Powered by<a href="http://WordPress.org">WordPress</a>.';
        });

        /* Dump the yoast SEO columns that are ugly and messy */
        add_filter( 'wpseo_use_page_analysis', '__return_false' );

        /* WP Init */
        add_action('init',function() {

            /* Register Custom Post Types */
            $register_custom_post_types = THEME_PREFIX."register_custom_post_types";
            if(function_exists($register_custom_post_types)) {
                $register_custom_post_types();
            }

            /* Add ACF Options Page */
            if(function_exists("acf_add_options_page")) {
                acf_add_options_page("Theme Options");

                // Support Groups archive ACF Options page
                acf_add_options_page(
                  array(
                    'page_title' => 'Support Groups Archive',
                    'position' => 21,
                    'icon_url' => 'dashicons-groups'
                  )
                );
            }

            /* Remove Head Links */
            remove_action('wp_head', 'rsd_link');
            remove_action('wp_head', 'wlwmanifest_link');
            remove_action('wp_head', 'wp_generator');

            /* Add Page Excerpts */
            add_post_type_support('page',['excerpt']);


            /* Check for Campus Clear */
            if(isset($_GET['clear_campus'])) {
                sb_clear_campus_cookie();
            }

        });

        /* Widgets Init */
        add_action('widgets_init',function() {

            global $wp_widget_factory;

            unregister_widget( 'WP_Widget_Calendar' );
            unregister_widget( 'WP_Widget_Links' );
            unregister_widget( 'WP_Widget_Meta' );
            unregister_widget( 'WP_Widget_Search' );
            unregister_widget( 'WP_Widget_Recent_Comments' );

            /* Remove the recent comments style that is automatically added */
            /*
            remove_action('wp_head',[
                $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
                'recent_comments_style'
            ]);
            */

        },1);

        /* Stop automatically hyperlinking images to themselves */
        if(get_option('image_default_link_type')!=='none') {
            update_option('image_default_link_type','none');
        }

        /* Post Theme Setup */
        add_action('after_setup_theme',function() {

            add_theme_support( 'menus' );
            add_theme_support( 'post-thumbnails' );
            add_theme_support( 'automatic-feed-links' );

            remove_action( 'wp_head', 'rsd_link' );
            remove_action( 'wp_head', 'wlwmanifest_link' );
            remove_action( 'wp_head', 'wp_generator' );
            remove_action( 'wp_head', 'start_post_rel_link' );
            remove_action( 'wp_head', 'index_rel_link' );
            remove_action( 'wp_head', 'adjacent_posts_rel_link' );

        });


        /* Set up custom thumbnail sizes */
        add_image_size( 'event_home', '500', '300', 'true' );
        add_image_size( 'staff_grid', '200', '240', 'true' );
        add_image_size( 'featured-image', '1920', '470', 'true' );
        add_image_size( 'parallax', '1920', '1000', 'true' );
        add_image_size( 'parallax-foreground', '1024', '370', 'true' );
        add_image_size( 'large_hero', '2900', '1600', 'true' );
        add_image_size( 'small_hero', '2900', '800', 'true' );
        add_image_size( 'landing_ev_img', '2900', '1090', 'true' );
        add_image_size( 'support_group', 600, 600, false );

        add_filter('excerpt_more',function() {
            return ' &hellip; <a href="'. get_permalink() . '">' . __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'f1' ) . '</a>';
        });

        add_filter('gallery_style',function($css) {
            return preg_replace( "#<style type='text/css'>(.*?)</style>#s", '', $css );
        });

        /* Check User Capabilities */
        $current_user = null;
        get_currentuserinfo();
        if(!current_user_can('update_plugins')) {
            add_action("init",function() { remove_action('init','wp_version_check'); },2);
            add_filter( 'pre_option_update_core',function() { return null; });
        }

        /* Remove Dashboard Boxes */
        add_action('admin_menu',function() {
            // remove_meta_box( 'dashboard_right_now', 'dashboard', 'core' ); // Right Now Overview Box
            // remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'core' ); // Incoming Links Box
            remove_meta_box( 'dashboard_quick_press', 'dashboard', 'core' ); // Quick Press Box
            remove_meta_box( 'dashboard_plugins', 'dashboard', 'core' ); // Plugins Box
            remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'core' ); // Recent Drafts Box
            remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'core' ); // Recent Comments
            remove_meta_box( 'dashboard_primary', 'dashboard', 'core' ); // WordPress Development Blog
            remove_meta_box( 'dashboard_secondary', 'dashboard', 'core' ); // Other WordPress News
        });

        /* Remove Default Meta Boxes */
        add_action('admin_menu',function() {

            /* Posts */
            remove_meta_box( 'postcustom','post','normal' ); // Custom Fields Metabox
            remove_meta_box( 'postexcerpt','post','normal' ); // Excerpt Metabox
            remove_meta_box( 'commentstatusdiv','post','normal' ); // Comments Metabox
            remove_meta_box( 'trackbacksdiv','post','normal' ); // Talkback Metabox
            remove_meta_box( 'authordiv','post','normal' ); // Author Metabox

            /* Pages */
            remove_meta_box( 'postcustom','page','normal' ); // Custom Fields Metabox
            remove_meta_box( 'commentstatusdiv','page','normal' ); // Discussion Metabox
            remove_meta_box( 'authordiv','page','normal' ); // Author Metabox

        });

        /* Remove lame user profit data */
        add_filter('user_contactmethods',function($contactmethods) {
            unset($contactmethods['aim']);
            unset($contactmethods['jabber']);
            unset($contactmethods['yim']);
            return $contactmethods;
        },10,1);

        /* Make TinyMCE allow iframes */
        add_filter('tiny_mce_before_init',function($a) {
            $a["extended_valid_elements"] = "iframe[id|class|title|style|align|frameborder|height|longdesc|marginheight|marginwidth|name|scrolling|src|width]";
            return $a;
        });

        /* Remove Custom Fields/Excerpts from Events */
        add_filter("em_cp_event_supports",function($a) {
            return ['title','editor','custom-fields','revisions','post-formats'];
        });

        /* Add WP Media Element for Series Engine */
        add_action("wp_enqueue_scripts",function() {
            wp_enqueue_script('wp-mediaelement');
        });

        /* Ensure Event archive pages use proper template */
        add_action("generate_rewrite_rules",function($wp_rewrite) {
            $new_rules = [
              'events/categories/(.+?)/feed/(feed|rdf|rss|rss2|atom)/?$' => 'index.php?post_type=event&event-categories=$matches[1]&feed=$matches[2]',
              'events/categories/(.+?)/(feed|rdf|rss|rss2|atom)/?$' => 'index.php?post_type=event&event-categories=$matches[1]&feed=$matches[2]',
              'events/categories/(.+?)/page/?([0-9]{1,})/?$' => 'index.php?post_type=event&event-categories=$matches[1]&paged=$matches[2]',
              'events/categories/(.+?)/?$' => 'index.php?post_type=event&event-categories=$matches[1]'
            ];
            $wp_rewrite->rules = array_merge($wp_rewrite->rules,$new_rules);
        },100);
        add_filter("template_include",function($template) {
            global $wp_query;
            if(!$wp_query->is_post_type_archive) {
                return $template;
            }
            if(!isset($wp_query->query['post_type'])||!in_array($wp_query->query['post_type'],['event','event-recurring'])) {
                return $template;
            }
            return get_query_template('event',['archive-events.php','archive.php','index.php']);
        },100);

    }
}

// Enqueue section
function wpb_adding_scripts() {
  wp_register_script('flip', get_template_directory_uri() . '/js/jquery.flip.min.js', array('jquery'),'1.1.1', true);
  wp_enqueue_script('flip');

  wp_register_script('global', get_template_directory_uri() . '/js/global.js', array('jquery'),'', true);
  wp_enqueue_script('global');

  wp_register_script('prelude-js', get_template_directory_uri() . '/js/theme.min.js', array('jquery'),'2.2.1', true);
  wp_enqueue_script('prelude-js');
}

add_action( 'wp_enqueue_scripts', 'wpb_adding_scripts' );


if(!function_exists("sb_get_sidebar_menus"))
{
    function sb_get_sidebar_menus($post = null)
    {
        if(!$post) {
            $post = get_queried_object();
        }
        if(!$post) {
            return [];
        }

        $menus = [];

        $post_id = $post->ID;
        $sidebar_menus = [];
        while(!$sidebar_menus) {
            if(!get_field("use_parent_menu",$post_id)) {
                $sidebar_menus = get_field("sidebar_menus",$post_id);
                break;
            }
            if(!($post_id = wp_get_post_parent_id($post_id))) {
                break;
            }
        }

        if(!$sidebar_menus) {
            return $menus;
        }

        foreach($sidebar_menus as $obs) {
            if(!($menu=wp_get_nav_menu_object($obs['sidebar_menu']))) {
                continue;
            }
            $menus[$menu->name] = sb_get_nav_menu([
                'menu'=>$menu->term_id,
                'items_wrap'=>'<ul class="no-bullet">%3$s</ul>'
            ]);
        }

        return $menus;
    }
}

if(!function_exists("sb_get_sidebar_content"))
{
    function sb_get_sidebar_content($post = null)
    {
        if(!$post) {
            $post = get_queried_object();
        }
        if(!$post) {
            return [];
        }

        $menus = [];
        $post_id = $post->ID;

        while(get_field("use_parent_sidebar_content",$post_id)) {
            if(!($id = wp_get_post_parent_id($post_id))) {
                break;
            }
            $post_id = $id;
        }

        return sb_get_content_field("sidebar_content",$post_id);
    }
}

if(!function_exists("sb_get_post_id_by_location_id"))
{
    function sb_get_post_id_by_location_id($location_id)
    {
        global $wpdb;
        $results = $wpdb->get_results(
            "select distinct ".$wpdb->base_prefix."posts.ID from ".$wpdb->base_prefix."posts ".
                "left join ".$wpdb->base_prefix."postmeta on(".$wpdb->base_prefix."posts.ID=".$wpdb->base_prefix."postmeta.post_id) ".
                "where post_type='location' and meta_key='_location_id' and meta_value='".$wpdb->_real_escape($location_id)."'"
        );
        return ($results) ? (int) $results[0]->ID : 0;
    }
}

if(!function_exists("sb_load_all_event_data"))
{
    function sb_load_all_event_data(WP_Post $event)
    {
         if(!($meta_values = get_post_meta($event->ID))) {
             return $event;
         }
         $event->meta = new stdClass;
         foreach($meta_values as $k => $v) {
             $v = $v[0];
             if($k==="_location_id") {
                 if(!$v) { continue; }
                 $event->meta->location = new stdClass;
                 $event->meta->location->post_id = sb_get_post_id_by_location_id($v);
                 if(!($location_meta = get_post_meta($event->meta->location->post_id))) {
                     continue;
                 }
                 foreach($location_meta as $lk =>$lv) {
                     $lv = $lv[0];
                     if(!preg_match("#^_location_#imsu",$k)) {
                         continue;
                     }
                     $lk = preg_replace("#^_location_#imsu","",$lk);
                     $event->meta->location->$lk = $lv;
                 }
                 continue;
             }
             if(!preg_match("#^_event_#imsu",$k)) {
                 continue;
             }
             $k = preg_replace("#^_event_#imsu","",$k);
             $event->meta->$k = $v;
        }
        return $event;
    }
}

if(!function_exists("sb_get_upcoming_events"))
{
    function sb_get_upcoming_events(array $args = [])
    {
        $events = get_posts(array_merge([
            'posts_per_page' => 4,
            'post_type' => 'event',
            'post_status' => 'publish',
            'suppress_filters' => true,
            'orderby' => 'meta_value',
            'meta_key' => '_event_start_date',
            'order' => 'ASC',
             'meta_query' => [
                [
                    'key' => '_event_start_date',
                    'value' => $today,
                    'compare' => '>=',
                ]
            ]
        ],$args));

        if(!$events) { return []; }

        foreach($events as $event) {
            $event = sb_load_all_event_data($event);
        }
        return $events;
    }
}

if(!function_exists("sb_get_campus_order"))
{
    function sb_get_campus_order()
    {
        $order = get_field("campus_order","option");
        $campus_order = [];
        foreach($order as $obs) {
            $campus_order[] = (int) $obs['campus'];
        }
        return $campus_order;
    }
}

if(!function_exists("sb_get_campuses"))
{
    function sb_get_campuses(array $args = [])
    {
        $campuses = get_posts(array_merge([
            'posts_per_page' => -1,
            'post_type' => 'sb_campus',
            'post_status' => 'publish',
            'suppress_filters' => true,
            'orderby' => 'post_title',
            'order' => 'ASC',
        ],$args));

        $order = sb_get_campus_order();
        usort($campuses,function($a,$b) use($order) {
            $ai = (($k=array_search((int)$a->ID,$order))!==false) ? $k : 9999;
            $bi = (($k=array_search((int)$b->ID,$order))!==false) ? $k : 9999;
            if($ai===$bi) {
                return strcmp($a->post_title,$b->post_title);
            }
            return ($ai<$bi) ? -1 : 1;
        });

        return $campuses;
    }
}

if(!function_exists("sb_get_homepage_post_id"))
{
    $homepage_post_id = null;
    function sb_get_homepage_post_id()
    {
        global $wpdb, $homepage_post_id;
        if(!is_null($homepage_post_id)) {
            return $homepage_post_id;
        }
        $results = $wpdb->get_results("select distinct post_id from wp_postmeta where meta_key='_wp_page_template' and meta_value='homepage.php'");
        $homepage_post_id = ($results) ? (int) $results[0]->post_id : 0;
        return $homepage_post_id;
    }
}

if(!function_exists("sb_get_eventspage_post_id"))
{
    $eventspage_post_id = null;
    function sb_get_eventspage_post_id()
    {
        global $wpdb, $eventspage_post_id;
        if(!is_null($eventspage_post_id)) {
            return $eventspage_post_id;
        }
        $results = $wpdb->get_results("select distinct post_id from wp_postmeta where meta_key='_wp_page_template' and meta_value='events.php'");
        $eventspage_post_id = ($results) ? (int) $results[0]->post_id : 0;
        return $eventspage_post_id;
    }
}

$init = THEME_PREFIX."template_init";
$init();

  /*-----------------------------------------------------------------------------
    Register Custom Menus
  -----------------------------------------------------------------------------*/
  function prelude_custom_menus() {
    register_nav_menus(
      array(
        'landing' => 'Landing Menu',
      )
    );
  }
  add_action( 'init', 'prelude_custom_menus' );
  // Social media icon menu as per http://justintadlock.com/archives/2013/08/14/social-nav-menus-part-2
  function prelude_social_menu() {
    if ( has_nav_menu( 'social' ) ) {
      wp_nav_menu(
        array(
          'theme_location' => 'social', 'container' => 'nav',
          'container_id'   => 'menu-social', 'container_class' => 'menu-social',
          'menu_id'        => 'menu-social-items', 'menu_class' => 'menu-items',
          'depth'          => 1,
          'link_before'    => '<span class="screen-reader-text">',
          'link_after'     => '</span>', 'fallback_cb' => '',
        )
      );
    }
  }

  // Register Devotions Custom Post Type
  function devotions() {

  	$labels = array(
  		'name'                  => _x( 'Devotions', 'Post Type General Name', 'text_domain' ),
  		'singular_name'         => _x( 'Devotion', 'Post Type Singular Name', 'text_domain' ),
  		'menu_name'             => __( 'Devotions', 'text_domain' ),
  		'name_admin_bar'        => __( 'Devotions', 'text_domain' ),
  		'archives'              => __( 'Devotion Archives', 'text_domain' ),
  		'attributes'            => __( 'Devotion Attributes', 'text_domain' ),
  		'parent_item_colon'     => __( 'Parent Devotion:', 'text_domain' ),
  		'all_items'             => __( 'All Devotions', 'text_domain' ),
  		'add_new_item'          => __( 'Add New Devotion', 'text_domain' ),
  		'add_new'               => __( 'Add New', 'text_domain' ),
  		'new_item'              => __( 'New Devotion', 'text_domain' ),
  		'edit_item'             => __( 'Edit Devotion', 'text_domain' ),
  		'update_item'           => __( 'Update Devotion', 'text_domain' ),
  		'view_item'             => __( 'View Devotion', 'text_domain' ),
  		'view_items'            => __( 'View Devotions', 'text_domain' ),
  		'search_items'          => __( 'Search Devotion', 'text_domain' ),
  		'not_found'             => __( 'Not found', 'text_domain' ),
  		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
  		'featured_image'        => __( 'Featured Image', 'text_domain' ),
  		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
  		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
  		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
  		'insert_into_item'      => __( 'Insert into Devotion', 'text_domain' ),
  		'uploaded_to_this_item' => __( 'Uploaded to this Devotion', 'text_domain' ),
  		'items_list'            => __( 'Devotions list', 'text_domain' ),
  		'items_list_navigation' => __( 'Devotions list navigation', 'text_domain' ),
  		'filter_items_list'     => __( 'Filter Devotions list', 'text_domain' ),
  	);
  	$args = array(
  		'label'                 => __( 'Devotion', 'text_domain' ),
  		'description'           => __( 'Devotions', 'text_domain' ),
  		'labels'                => $labels,
  		'supports'              => array( 'title', 'editor', 'thumbnail' ),
  		'hierarchical'          => true,
  		'public'                => true,
  		'show_ui'               => true,
  		'show_in_menu'          => true,
  		'menu_position'         => 20,
  		'show_in_admin_bar'     => true,
  		'show_in_nav_menus'     => true,
  		'can_export'            => true,
  		'has_archive'           => 'devotions',
  		'exclude_from_search'   => false,
  		'publicly_queryable'    => true,
  		'capability_type'       => 'page',
  	);
  	register_post_type( 'devotion', $args );

  }
  add_action( 'init', 'devotions', 0 );


/*-----------------------------------------------------------------------------
Filter posts from main query
-----------------------------------------------------------------------------*/

function exclude_posts_acf( $query ) {
    if ( !is_admin() && $query->is_home() && $query->is_main_query()) {
        $meta_query = $query->get('meta_query')? : [];
        $meta_query[] = [
            'relation' => 'OR',
            [
                'key' => 'post_skip',
                'compare' => 'NOT EXISTS'
            ],
            [
                'key' => 'post_skip',
                'value' => '1',
                'compare' => '!='
            ],
        ];
        $query->set('meta_query', $meta_query);
    }

    if( !is_admin() && is_post_type_archive('support-group') && $query->is_main_query() ) {
        $query->set('posts_per_page', -1);
        $query->set( 'order' , 'asc' );
        $query->set( 'orderby', 'title');
    //   $query->set('orderby', 'menu_order');
    //   $query->set('order', 'ASC');
    }
}
add_action( 'pre_get_posts', 'exclude_posts_acf' );

// Redirects
function redirects() {
  if( is_singular('support-group') ) {
    $new_url = esc_url(get_post_type_archive_link('support-group'));

    wp_redirect($new_url, 301);

    exit;
  } 
}
add_action('template_redirect', 'redirects');

function my_acf_init() {

acf_update_setting('google_api_key', 'AIzaSyD3juZh1Id66Q5rRRy68LlwBkr_FyDcQMY');
}

add_action('acf/init', 'my_acf_init');


// Custom excerpt length 
function custom_excerpt($limit, $text) {
  $excerpt = explode(' ', $text, $limit);

  if (count($excerpt) >= $limit) {
      array_pop($excerpt);
      $excerpt = implode(" ", $excerpt) . '...';
  } else {
      $excerpt = implode(" ", $excerpt);
  }

  $excerpt = preg_replace('`\[[^\]]*\]`', '', $excerpt);

  return $excerpt;
}

// Remove additional css option from customizer
function prefix_remove_css_section( $wp_customize ) {
  $wp_customize->remove_section( 'custom_css' );
}
add_action( 'customize_register', 'prefix_remove_css_section', 15 );

// Remove theme/plugin editors from admin
define( 'DISALLOW_FILE_EDIT', true );
