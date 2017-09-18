<?php if(!isset($wp)) { return; }

$sidebar_menus = sb_get_sidebar_menus();
$sidebar_content = sb_get_sidebar_content();
$show_sidebar = $sidebar_menus || $sidebar_content;

?>

<section class="page-content">
    <div class="row">
        <div class="large-12 columns">
            <?php
            // Get Post Articles
            get_template_part("components/posts/article");

            // Get Related Events
            //if( get_field('show_related_events') === true ){
              get_template_part("components/sections/related-events");
            //}
            ?>
        </div>
    </div>
</section>
