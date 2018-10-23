<?php if(!isset($wp)) { return; }

//vars
$large_image = wp_get_attachment_image_src(get_sub_field('large_hero_image'), 'large_hero');

?>

<section class="g-container landing--image_large" style="background:url('<?php echo $large_image[0]; ?>') center/cover no-repeat">

</section>
