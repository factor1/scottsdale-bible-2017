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

    // Menu Images
    while ( have_rows('header_images', 5) ) : the_row();
    // MegaMenu Images
    $visit = get_sub_field('visit_image');
    $connect = get_sub_field('connect_image');
    $serve = get_sub_field('serve_image');
    $watch = get_sub_field('watch_image');
    $care = get_sub_field('care_image');
    $give = get_sub_field('give_image');

    endwhile;

    $sub_items_wrap = "\n<nav>".
                          "\n<div class=\"box\">".
                              "\n<div class=\"row\">".
                                  "\n<div class=\"large-3 columns visit-image\" style=\"display:none; background-image: url(" . esc_attr($visit['sizes']['large']) . ");\">"."</div>".
                                  "\n<div class=\"large-3 columns connect-image\" style=\"display:none; background-image: url(" . esc_attr($connect['sizes']['large']) . ");\">"."</div>".
                                  "\n<div class=\"large-3 columns serve-image\" style=\"display:none; background-image: url(" . esc_attr($serve['sizes']['large']) . ");\">"."</div>".
                                  "\n<div class=\"large-3 columns watch-image\" style=\"display:none; background-image: url(" . esc_attr($watch['sizes']['large']) . ");\">"."</div>".
                                  "\n<div class=\"large-3 columns care-image\" style=\"display:none; background-image: url(" . esc_attr($care['sizes']['large']) . ");\">"."</div>".
                                  "\n<div class=\"large-3 columns give-image\" style=\"display:none; background-image: url(" . esc_attr($give['sizes']['large']) . ");\">"."</div>".
                                  "\n<div class=\"large-9 columns\">".
                                      "\n\t<ul class=\"inline-list\">".
                                          "\n%3\$s".
                                      "\n\t</ul>".
                                  "\n</div>".
                              "\n</div>".
                          "\n</div>".
                          "\n\t<ul class=\"inline-list mobile\">".
                              "\n%3\$s".
                          "\n\t</ul>".
                      "\n</nav>";

    // Load campus specific menus
    $campus_id = isset($_COOKIE['sb_campus']) ? $_COOKIE['sb_campus'] : '' ;
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

            <div class="small-6 columns col-shrink">
              <a href="/"><img src="<?php echo get_template_directory_uri(); ?>/images/2017SBClogo.png" alt="" title="" /></a>
            </div>


            <div class="small-6 columns hide-for-large-up text-center main-header"><a href="#"><i class="fa fa-bars fa-lg"></i><i class="fa fa-times fa-lg hide"></i> Menu</a></div>

            <div class="large-1 columns col-grow" id="visit">
                <a href="#"><span class="hover-feature">Visit</span></a>
                <?php
                echo sb_get_nav_menu([
                    'theme_location'=>$header_mega_menu_visit,
                    'items_wrap'=> $sub_items_wrap,
                    'walker'=> new factor1\SubMenuWalker()
                ]);
                ?>
            </div>
            <div class="large-1 columns col-grow" id="connect">
                <a href="#"><span class="hover-feature">Connect</span></a>
                <?php
                echo sb_get_nav_menu([
                    'theme_location'=>$header_mega_menu_connect,
                    'items_wrap'=> $sub_items_wrap,
                    'walker'=> new factor1\SubMenuWalker()
                ]);
                ?>
            </div>
            <div class="large-1 columns col-grow" id="serve">
                <a href="#"><span class="hover-feature">Serve</span></a>
                <?php
                echo sb_get_nav_menu([
                    'theme_location'=>$header_mega_menu_serve,
                    'items_wrap'=> $sub_items_wrap,
                    'walker'=> new factor1\SubMenuWalker()
                ]);
                ?>
            </div>
            <div class="large-1 columns col-grow" id="watch">
                <a href="#"><span class="hover-feature">Watch</span></a>
                <?php
                echo sb_get_nav_menu([
                    'theme_location'=>$header_mega_menu_watch,
                    'items_wrap'=> $sub_items_wrap,
                    'walker'=> new factor1\SubMenuWalker()
                ]);
                ?>
            </div>
            <div class="large-1 columns col-grow" id="care">
                <a href="#"><span class="hover-feature">Care</span></a>
                <?php
                echo sb_get_nav_menu([
                    'theme_location'=>$header_mega_menu_care,
                    'items_wrap'=> $sub_items_wrap,
                    'walker'=> new factor1\SubMenuWalker()
                ]);
                ?>
            </div>
            <div class="large-1 columns col-grow" id="give">
                <a class="last" href="#"><span class="hover-feature">Give</span></a>
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
