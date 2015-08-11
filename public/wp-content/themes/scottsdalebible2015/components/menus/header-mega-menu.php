<?php if(!isset($wp)) { return; }

$items_wrap = "\n<section>".
                                "\n\t<div class=\"row\">".
                                    "\n\t\t<div class=\"small-12 columns hide-for-medium-up text-center\"><a href=\"#\"><i class=\"fa fa-bars fa-lg\"></i> Site Menu</a></div>".
                                    "\n%3\$s".
                                "\n\t</div>".
                            "\n</section>";

if(!isset($post)) {
    $post = get_queried_object();
}

$header_menu = get_field("header_menu",$post->ID);
$header_menu = ($header_menu) ? wp_get_nav_menu_object($header_menu) : false;

if(!$header_menu) {

    // Load Default Theme Mega Menu
    echo sb_get_nav_menu([
        'theme_location'=>'header_mega_menu',
        'items_wrap'=>$items_wrap,
        'walker'=> new factor1\MegaMenuWalker()
    ]);

    return;
}

// Load Preset Menu
echo sb_get_nav_menu([
    'menu'=>$header_menu->term_id,
    'items_wrap'=>$items_wrap,
    'walker'=> new factor1\MegaMenuWalker()
]);


