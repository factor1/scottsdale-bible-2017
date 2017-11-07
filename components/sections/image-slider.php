<?php if(!isset($wp)) { return; } ?>

<?php if( get_field('hero_type', 5) == 'slider' ):

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

$image_sources = array_map(function($e) {
    return esc_attr($e->url);
},$images);

?>
<script type="text/javascript">
// preloadImages('<?php echo implode("','",$image_sources); ?>');
</script>
<section class="image-slider">
    <ul>
        <?php foreach($images as $image) { ?>
        <li>
            <a<?php echo (($url=$image->slider_image_link)?" href=\"".esc_attr($url)."\"":""); ?> class="image-block-center">
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
<?php endif;  ?>
