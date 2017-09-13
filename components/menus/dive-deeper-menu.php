<?php if(!isset($wp)) { return; }

$sidebar_menus = sb_get_sidebar_menus();
$sidebar_content = sb_get_sidebar_content();
$show_sidebar = $sidebar_menus || $sidebar_content;
$sidebar_description = ($c=sb_get_content_field("page_content")) ? $c : sb_get_the_content();
$sidebar_image = get_field("sidebar_image");

?>

<?php if($show_sidebar) { ?>
<section class="dive-deeper">
    <div class="row text-center menu-bar fullWidth">
      <div class="large-12 columns text-center menu-icon"><a><i class="fa fa-bars fa-lg"></i><i class="fa fa-times fa-lg hide"></i> Menu</a></div>
    </div>
    <div class="row menu">
        <div class="large-4 columns sidebar text-center">
            <?php foreach($sidebar_menus as $menu_title => $menu) { ?>
                <div class="fullWidth sidebar-image" style="background-image: url(<?php echo esc_attr($sidebar_image['sizes']['large']); ?>);"></div>
                <h3><?php echo esc_html($menu_title); ?></h3>
                <p><?php echo $sidebar_description; ?></p>
        </div>
        <div class="large-2 columns">
                <?php echo $menu; ?>
            <?php } ?>
            <?php if($sidebar_content) { ?>
            <div>
                <?php echo $sidebar_content; ?>
            </div>
            <?php } ?>
        </div>
        <div class="large-6 columns"> Test</div>
    </div>
    <br style="clear:both" />
</section>
<?php } ?>
