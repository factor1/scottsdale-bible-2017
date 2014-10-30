<?php if(!isset($wp)) { return; }

$items_wrap = "\n<section>".
                                "\n\t<div class=\"row\">".
                                    "\n\t\t<div class=\"small-12 columns hide-for-medium-up text-center\"><a href=\"#\"><i class=\"fa fa-bars fa-lg\"></i></a></div>".
                                    "\n%3\$s".
                                "\n\t</div>".
                            "\n</section>";

echo sb_get_nav_menu([
    'theme_location'=>'header_mega_menu',
    'items_wrap'=>$items_wrap,
    'walker'=> new factor1\MegaMenuWalker()
]);
