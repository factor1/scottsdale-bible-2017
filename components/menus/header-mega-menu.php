<?php if(!isset($wp)) { return; }

$items_wrap = "\n<section>".
                                "\n\t<div class=\"row\">".
                                    "\n\t\t<div class=\"small-12 columns hide-for-medium-up text-center\"><a href=\"#\"><i class=\"fa fa-bars fa-lg\"></i> Menu</a></div>".
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

    /* old mega menu not used anymore
    echo sb_get_nav_menu([
        'theme_location'=>'header_mega_menu',
        'items_wrap'=>$items_wrap,
        'walker'=> new factor1\MegaMenuWalker()
    ]);
    */

    $sub_items_wrap = "\n<nav>".
                                            "\n\t<ul class=\"inline-list\">".
                                                "\n%3\$s".
                                            "\n\t</ul>".
                                        "\n</nav>";

    // Load campus specific menus
    $campus_id = sb_get_campus_cookie();
    $campus = ($campus_id) ? get_post($campus_id) : null;
    $campus_name = ($campus) ? $campus->post_title : null;

    switch($campus_name) {
        case 'Cactus Campus':
            $header_mega_menu_visit = 'cactus_header_mega_menu_visit';
            $header_mega_menu_connect = 'cactus_header_mega_menu_connect';
            $header_mega_menu_serve = 'cactus_header_mega_menu_serve';
            $header_mega_menu_watch = 'cactus_header_mega_menu_watch';
            $header_mega_menu_care = 'cactus_header_mega_menu_care';
            $header_mega_menu_give = 'cactus_header_mega_menu_give';
        break;
        case 'Mountain Valley':
            $header_mega_menu_visit = 'mv_header_mega_menu_visit';
            $header_mega_menu_connect = 'mv_header_mega_menu_connect';
            $header_mega_menu_serve = 'mv_header_mega_menu_serve';
            $header_mega_menu_watch = 'mv_header_mega_menu_watch';
            $header_mega_menu_care = 'mv_header_mega_menu_care';
            $header_mega_menu_give = 'mv_header_mega_menu_give';
        break;
        case 'Shea Campus':
            $header_mega_menu_visit = 'shea_header_mega_menu_visit';
            $header_mega_menu_connect = 'shea_header_mega_menu_connect';
            $header_mega_menu_serve = 'shea_header_mega_menu_serve';
            $header_mega_menu_watch = 'shea_header_mega_menu_watch';
            $header_mega_menu_care = 'shea_header_mega_menu_care';
            $header_mega_menu_give = 'shea_header_mega_menu_give';
        break;
        default:
            $header_mega_menu_visit = 'header_mega_menu_visit';
            $header_mega_menu_connect = 'header_mega_menu_connect';
            $header_mega_menu_serve = 'header_mega_menu_serve';
            $header_mega_menu_watch = 'header_mega_menu_watch';
            $header_mega_menu_care = 'header_mega_menu_care';
            $header_mega_menu_give = 'header_mega_menu_give';
        break;
    }

    ?>
    <section>
        <div class="row">
            <div class="medium-6 columns">
              <a href="/"><img src="<?php echo get_template_directory_uri(); ?>/images/sbclogo.png" alt="" title="" /></a>
            </div>
            <div class="small-12 columns hide-for-medium-up text-center"><a href="#"><i class="fa fa-bars fa-lg"></i> Menu</a></div>

            <div class="medium-1 columns">
                <a href="#">Visit</a>
                <?php
                echo sb_get_nav_menu([
                    'theme_location'=>$header_mega_menu_visit,
                    'items_wrap'=> $sub_items_wrap,
                    'walker'=> new factor1\SubMenuWalker()
                ]);
                ?>
            </div>
            <div class="medium-1 columns">
                <a href="#">Connect</a>
                <?php
                echo sb_get_nav_menu([
                    'theme_location'=>$header_mega_menu_connect,
                    'items_wrap'=> $sub_items_wrap,
                    'walker'=> new factor1\SubMenuWalker()
                ]);
                ?>
            </div>
            <div class="medium-1 columns">
                <a href="#">Serve</a>
                <?php
                echo sb_get_nav_menu([
                    'theme_location'=>$header_mega_menu_serve,
                    'items_wrap'=> $sub_items_wrap,
                    'walker'=> new factor1\SubMenuWalker()
                ]);
                ?>
            </div>
            <div class="medium-1 columns">
                <a href="#">Watch</a>
                <?php
                echo sb_get_nav_menu([
                    'theme_location'=>$header_mega_menu_watch,
                    'items_wrap'=> $sub_items_wrap,
                    'walker'=> new factor1\SubMenuWalker()
                ]);
                ?>
            </div>
            <div class="medium-1 columns">
                <a href="#">Care</a>
                <?php
                echo sb_get_nav_menu([
                    'theme_location'=>$header_mega_menu_care,
                    'items_wrap'=> $sub_items_wrap,
                    'walker'=> new factor1\SubMenuWalker()
                ]);
                ?>
            </div>
            <div class="medium-1 columns">
                <a href="#">Give</a>
                <?php
                echo sb_get_nav_menu([
                    'theme_location'=>$header_mega_menu_give,
                    'items_wrap'=> $sub_items_wrap,
                    'walker'=> new factor1\SubMenuWalker()
                ]);
                ?>
            </div>

        </div>
    </section>
    <?php

    return;
}

// Load Preset Menu
echo sb_get_nav_menu([
    'menu'=>$header_menu->term_id,
    'items_wrap'=>$items_wrap,
    'walker'=> new factor1\MegaMenuWalker()
]);
