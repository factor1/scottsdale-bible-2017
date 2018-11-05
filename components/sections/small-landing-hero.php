<?php if(!isset($wp)) { return; }

//vars
$small_image = wp_get_attachment_image_src(get_sub_field('small_hero_image'), 'small_hero');

?>

<section class="g-container landing--image_small" style="background:url('<?php echo $small_image[0]; ?>') center/cover no-repeat">

</section>
