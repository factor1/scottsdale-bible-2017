<?php

define("THEME_PREFIX","sb_");
define("THEME_TIMEZONE","America/Phoenix");

define("CAMPUS_COOKIE","sb_campus");
define("CAMPUS_COOKIE_EXPIRATION",(60*60*24*30)); // Seconds Added to Current Time

if(!defined("THEME_TYPEKIT")) {
    define("THEME_TYPEKIT",""); // Defined in wp-config
}

date_default_timezone_set(THEME_TIMEZONE);

require_once("lib/factor1/bootstrap.php");

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
            }

            /* Remove Head Links */
            remove_action('wp_head', 'rsd_link');
            remove_action('wp_head', 'wlwmanifest_link');
            remove_action('wp_head', 'wp_generator');

            /* Add Page Excerpts */
            add_post_type_support('page',['excerpt']);

            /* Add Meta Author */
            add_action( 'wp_head',function() {
                echo "<meta name=\"author\" content=\"Factor1\" />";
            });

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

        /* Add Clear Cookie to Admin Menu */
        add_action("admin_bar_menu",function($wp_admin_bar) {
            if(!sb_get_campus_cookie()) {
                return;
            }
            $wp_admin_bar->add_node([
                'id' => THEME_PREFIX.'_clear_campus',
                'title' => 'Clear Campus Cookie',
                'href' => getRequestURI(false).(($q=getRequestURIQuery())?$q."&":"?")."clear_campus"
            ]);
        },999);

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

    }
}

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
            'orderby' => 'post_date',
            'order' => 'DESC',
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

if(!function_exists("sb_campus_cookie_check"))
{
    function sb_campus_cookie_check()
    {
        if(!($campus=sb_get_campus_cookie())) {
            return;
        }
        if(!($permalink=get_permalink($campus))) {
            return;
        }
        header("Location: ".$permalink);
        header("Status: 302");
        exit;
    }
}

if(!function_exists("sb_set_campus_cookie"))
{
    function sb_set_campus_cookie($id)
    {
        if(isset($_GET['clear_campus'])) {
            return;
        }
        sb_create_cookie(CAMPUS_COOKIE,(string)$id,time()+CAMPUS_COOKIE_EXPIRATION,"/");
    }
}

if(!function_exists("sb_get_campus_cookie"))
{
    function sb_get_campus_cookie()
    {
        return (isset($_COOKIE[CAMPUS_COOKIE])&&$_COOKIE[CAMPUS_COOKIE]) ? (int) $_COOKIE[CAMPUS_COOKIE] : 0;
    }
}

if(!function_exists("sb_clear_campus_cookie"))
{
    function sb_clear_campus_cookie()
    {
        $_COOKIE[CAMPUS_COOKIE] = null;
        sb_create_cookie(CAMPUS_COOKIE,"0",time()-CAMPUS_COOKIE_EXPIRATION,"/");
        add_action("admin_notices",function() {
            echo    "<div class=\"updated\">".
                            "<p>Campus cookie has been cleared!</p>".
                        "</div>";
        });
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

$init = THEME_PREFIX."template_init";
$init();