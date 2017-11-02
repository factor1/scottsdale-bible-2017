<?php if(!isset($wp)) { return; }

if(!isset($post)) {
    $post = get_queried_object();
}
$story_post_id = (get_field("use_homepage_story")) ? sb_get_homepage_post_id() : $post->ID;

$upcoming_story = ($f=get_field("upcoming_story",$story_post_id)) ? (object) $f[0] : null;

if(!$upcoming_story) {
    return;
}

?>

<?php if($upcoming_story) { ?>
<section class="upcoming-message fullWidth" data-parallax="scroll" data-image-src="<?php echo esc_attr($upcoming_story->background_image['sizes']['full']); ?>">

    <div>
        <?php if($upcoming_story->foreground_image) { ?>
          <img src="<?php echo esc_attr($upcoming_story->foreground_image['sizes']['large']); ?>" /><br>
        <?php } ?>
        <?php if($upcoming_story->show_button_option === true) { ?>
          <a href="<?php echo esc_attr($upcoming_story->button_internal_link); ?>" class="button" data-target="new-window"><?php echo esc_attr($upcoming_story->button_text); ?></a>
        <?php } ?>
    </div>
</section>
<?php } ?>
