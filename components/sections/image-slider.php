<?php if(!isset($wp)) { return; } ?>

<?php if( get_field('hero_type') == 'slider' ):

if(!isset($post)) {
    $post = get_queried_object();
}
$slider_post_id = (get_field("use_homepage_slider")) ? sb_get_homepage_post_id() : $post->ID;

// $images = sb_get_slider_images("image_slider","slider_image",true,$slider_post_id);
$images = get_field("image_slider", $slider_post_id);
$slide_count = count($images);

if( have_rows("image_slider", $slider_post_id) ) : ?>
  <section class="image-slider">
    <ul>

      <?php while( have_rows("image_slider", $slider_post_id) ) : the_row(); 
        $image = get_sub_field('slider_image');
        $link = get_sub_field('slider_image_link'); ?>

        <li>
          <a href="<?php echo $link; ?>" class="image-block-center">
            <img src="<?php echo esc_attr($image['sizes']['large_hero']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
          </a>
        </li>

      <?php endwhile; ?>
    </ul>
    <?php if($slide_count>1) { ?>
    <div class="controls-move">
        <?php for($n=1;$n<=$slide_count;$n++) { ?>
        <i class="fa fa-circle-o fa-lg<?php echo (($n===1)?" active":""); ?>"></i>
        <?php } ?>
    </div>
    <?php } ?>
  </section>
<?php endif; 

endif; ?>
