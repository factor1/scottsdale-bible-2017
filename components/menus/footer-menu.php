<?php if(!isset($wp)) { return; }

echo sb_get_nav_menu([
    'theme_location'=>'footer_menu',
    'items_wrap'=>"\n<ul class=\"small-block-grid-2 medium-block-grid-3 large-block-grid-6\">\n%3\$s\n</ul>",
    'walker'=> new factor1\FooterMenuWalker()
]);
