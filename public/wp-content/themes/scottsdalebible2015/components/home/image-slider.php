<?php if(!isset($wp)) { return; } ?>

<?php if($images=sb_get_slider_images("image_slider","slider_image",true)) { $slide_count = count($images); ?>
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
    <div class="controls-move">
        <?php for($n=1;$n<=$slide_count;$n++) { ?>
        <i class="fa fa-circle-o fa-lg<?php echo (($n===1)?" active":""); ?>"></i>
        <?php } ?>
    </div>
</section>
<?php } ?>