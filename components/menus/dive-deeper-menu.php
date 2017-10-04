<?php if(!isset($wp)) { return; }

$sidebar_menus = sb_get_sidebar_menus();
$sidebar_content = sb_get_sidebar_content();
$show_sidebar = $sidebar_menus || $sidebar_content;
$sidebar_description = get_field("sidebar_description");
$sidebar_image = get_field("sidebar_image");

?>

<?php if($show_sidebar) { ?>
<section class="dive-deeper">
    <div class="row text-center menu-bar fullWidth">
      <div class="large-12 columns text-center menu-icon"><a><i class="fa fa-bars fa-lg bars hide"></i><i class="fa fa-times times fa-lg"><span> Hide</span></i></a></div>
    </div>
    <div class="row menu">
        <div class="medium-4 columns sidebar text-center">
            <?php foreach($sidebar_menus as $menu_title => $menu) { ?>
                <?php if($sidebar_image) { ?>
                <div class="fullWidth sidebar-image" style="background-image: url(<?php echo esc_attr($sidebar_image['sizes']['large']); ?>);"></div>
                <?php } ?>
                <h3><?php echo esc_html($menu_title); ?></h3>
                <?php if($sidebar_description) { ?>
                <p><?php echo $sidebar_description; ?></p>
                <?php } ?>
        </div>
        <div class="medium-3 columns">
                <?php echo $menu; ?>
            <?php } ?>
        </div>
        <div class="medium-5 columns">
          <?php echo $menu; ?>
        </div>
    </div>
    <br style="clear:both" />
</section>
<?php } ?>
