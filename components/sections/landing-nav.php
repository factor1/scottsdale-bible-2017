<?php if(!isset($wp)) { return; }

//vars
$small_image = wp_get_attachment_image_src(get_sub_field('small_hero_image'), 'small_hero');

?>

<section class="g-container">
  <div class="g-row g-row--justify-content-center">
    <div class="g-col-10 g-col-centered g-sm-col-10 text-center">
      <?php // Landing Menu
        wp_nav_menu( array('theme_location' => 'landing', 'container_class' => 'nav--landing') ); ?>
    </div>
  </div>

</section>
