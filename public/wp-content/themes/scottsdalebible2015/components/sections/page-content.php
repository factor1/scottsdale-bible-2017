<?php if(!isset($wp)) { return; }

$sidebar_menus = sb_get_sidebar_menus();
$sidebar_content = sb_get_sidebar_content();
$show_sidebar = $sidebar_menus || $sidebar_content;

?>

<section class="page-content">
    <div class="row">
        <?php if($show_sidebar) { ?>
        <div class="large-3 columns sidebar">
            <?php foreach($sidebar_menus as $menu_title => $menu) { ?>
                <h3><?php echo esc_html($menu_title); ?></h3>
                <?php echo $menu; ?>
            <?php } ?>
            <?php if($sidebar_content) { ?>
            <div>
                <?php echo $sidebar_content; ?>
            </div>
            <?php } ?>
        </div>
        <div class="large-9 columns">
        <?php } else { ?>
        <div class="large-12 columns">
        <?php } ?>
            <?php get_template_part("components/posts/article"); ?>
        </div>
    </div>
</section>