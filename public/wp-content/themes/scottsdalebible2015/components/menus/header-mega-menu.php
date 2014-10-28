<?php if(!isset($wp)) { return; }

echo sb_get_nav_menu([
    'theme_location'=>'header_mega_menu',
    'items_wrap'=>"\n<section>\n\t<div class=\"row\">\n%3\$s\n\t</div>\n</section>",
    'walker'=> new factor1\MegaMenuWalker()
]);
