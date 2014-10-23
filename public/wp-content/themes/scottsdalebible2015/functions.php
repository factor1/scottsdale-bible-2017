<?php

define("THEME_PREFIX","sb_");
define("THEME_TIMEZONE","America/New_York");

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

        });

        /* Widgets Init */
        add_action('widgets_init',function() {

            global $wp_widget_factory;

            unregister_widget( 'WP_Widget_Calendar' );
            unregister_widget( 'WP_Widget_Links' );
            unregister_widget( 'WP_Widget_Meta' );
            unregister_widget( 'WP_Widget_Search' );
            unregister_widget( 'WP_Widget_Recent_Comments' );

            register_sidebar([
                'name' => __( 'Sidebar', 'f1' ),
                'id' => 'sidebar',
                'description' => __( 'The primary widget area on the right side', 'f1' ),
                'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<h4 class="widget-title">',
                'after_title' => '</h4>'
            ]);

            /* Remove the recent comments style that is automatically added */
            remove_action('wp_head',[
                $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
                'recent_comments_style'
            ]);

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

    }
}

$init = THEME_PREFIX."template_init";
$init();