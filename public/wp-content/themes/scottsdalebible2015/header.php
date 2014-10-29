<?php

$translator = (shortcode_exists("google-translator")) ? do_shortcode('[google-translator]') : "";

?>
<!doctype html>
<!--[if lt IE 7 ]><html lang="en" class="no-js ie ie6"><![endif]-->
<!--[if IE 7 ]><html lang="en" class="no-js ie ie7"><![endif]-->
<!--[if IE 8 ]><html lang="en" class="no-js ie ie8"><![endif]-->
<!--[if IE 9 ]><html lang="en" class="no-js ie ie9"><![endif]-->
<!--[if gt IE 9]><html lang="en" class="no-js ie"><![endif]-->
<!--[if !IE]><!--><html lang="en" class="no-js"><!--<![endif]-->
<head profile="http://gmpg.org/xfn/11">
    <meta http-equiv="personal" content="no-cache" />
    <meta name="rating" content="general" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=UTF-8" />
    <?php if (is_search()) { ?>
    <meta name="robots" content="noindex, nofollow" />
    <?php } ?>
    <meta property="og:title" content="<?php the_title(); ?>" />
    <meta property="og:description" content="<?php the_excerpt(); ?>" />
    <meta property="og:site_name" content="<?php bloginfo('name') ?>" />
    <title><?php echo sb_get_page_title(); ?></title>
    <meta name="author" content="Factor1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?php if(@file_exists(get_template_directory()."/favicon.ico")) { /* ?>
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri()."/favicon.ico"; ?>" type="image/x-icon" />
    <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri()."/images/touch-icon.png"; ?>" />
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri()."/images/touch-icon.png"; ?>" />
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri()."/images/touch-icon.png"; ?>" />
    <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri()."/images/touch-icon.png"; ?>" sizes="96x96">
    <meta name="msapplication-TileColor" content="#222222">
    <?php */ } ?>
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <!--[if lt IE 9]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <?php wp_head(); ?>
    <link href="https://fonts.googleapis.com/css?family=Oswald:400,300,700" rel="stylesheet" type="text/css" />
    <link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/foundation/5.4.6/css/normalize.css" />
    <link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/foundation/5.4.6/css/foundation.min.css" />
    <link type="text/css" rel="stylesheet"  href="https://netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.css" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri()."/css/jquery.remodal.css"; ?>" type="text/css" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri()."/style.css"; ?>" type="text/css" />
    <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
    <script src="https://code.jquery.com/ui/1.11.2/jquery-ui.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/5.4.6/js/foundation.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/5.4.6/js/foundation/foundation.tooltip.min.js"></script>
    <script src="<?php echo get_template_directory_uri()."/js/jquery.remodal.min.js"; ?>" type="text/javascript"></script>
    <script src="<?php echo get_template_directory_uri()."/js/jquery.f1.up-down-slider.min.js"; ?>" type="text/javascript"></script>
    <script src="<?php echo get_template_directory_uri()."/js/theme.min.js"; ?>" type="text/javascript"></script>
    <?php if(THEME_TYPEKIT) { ?>
    <script src="<?php echo THEME_TYPEKIT; ?>"></script>
    <script>try{Typekit.load();}catch(e){}</script>
    <?php } ?>
</head>
<body <?php body_class(); ?>>

<?php echo $translator; ?>

<header>
    <div class="row">
        <div class="large-4 columns">
            <a href="/"><img src="<?php echo get_template_directory_uri(); ?>/images/sbclogo.png" alt="" title="" /></a>
        </div>
        <div class="large-8 columns">
            <ul class="inline-list">
                <li>
                    <i class="fa fa-lock"></i><a href="<?php echo wp_login_url(); ?>">Sign In</a>
                </li>
                <li>
                    <i class="fa fa-map-marker"></i><a href="#">Select Your Campus</a>
                </li>
                <li>
                    <form data-action="<?php bloginfo('siteurl'); ?>">
                        <i class="fa fa-search"></i><input type="text" name="search" value="" placeholder="Search" />
                    </form>
                </li>
            </ul>
        </div>
    </div>
    <?php get_template_part("components/menus/header-mega-menu"); ?>
    </div>
</header>