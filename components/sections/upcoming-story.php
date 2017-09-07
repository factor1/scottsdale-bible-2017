<?php if(!isset($wp)) { return; }

if(!isset($post)) {
    $post = get_queried_object();
}
$story_post_id = (get_field("use_homepage_story")) ? sb_get_homepage_post_id() : $post->ID;

$upcoming_story = get_field("upcoming_story",$story_post_id);

if(!$upcoming_story) {
    return;
}

?>
<section class="upcoming-story">
    <div class="row">
        <?php if($upcoming_story) { ?>
        <div class="small-12 columns">
            <div>
                <img src="<?php echo get_template_directory_uri() ?>/images/holders/LifeisbetterConnectedlogo.png" />
                <br style="clear:both" />
                <a href="#" class="button" data-target="new-window">Learn More</a>
            </div>
        </div>
        <?php } ?>
    </div>
</section>
