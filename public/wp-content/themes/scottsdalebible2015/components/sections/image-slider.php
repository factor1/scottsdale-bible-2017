<?php if(!isset($wp)) { return; }

if(!isset($post)) {
    $post = get_queried_object();
}
$slider_post_id = (get_field("use_homepage_slider")) ? sb_get_homepage_post_id() : $post->ID;

$images = sb_get_slider_images("image_slider","slider_image",true,$slider_post_id);

if(!$images) {
    return;
}

$first = array_shift($images);
$images = array_merge([$first],array_reverse($images));

$slide_count = count($images);

?>
<section class="image-slider">
    <ul>
        <?php foreach($images as $image) { ?>
        <li>
            <a<?php echo (($url=$image->slider_image_link)?" href=\"".esc_attr($url)."\"":""); ?>>
                <img src="<?php echo esc_attr($image->url); ?>" alt="<?php echo esc_attr($image->title); ?>" title="<?php echo esc_attr($image->title); ?>" />
            </a>
        </li>
        <?php } ?>
    </ul>
    <?php if($slide_count>1) { ?>
    <div class="controls-move">
        <?php for($n=1;$n<=$slide_count;$n++) { ?>
        <i class="fa fa-circle-o fa-lg<?php echo (($n===1)?" active":""); ?>"></i>
        <?php } ?>
    </div>
    <?php } ?>
</section>