<?php if(!isset($wp)) { return; }

if(!isset($post)) {
    $post = get_queried_object();
}
$msg_post_id = (get_field("use_homepage_messages")) ? sb_get_homepage_post_id() : $post->ID;

$last_weekend = ($f=get_field("last_weekend_message",$msg_post_id)) ? (object) $f[0] : null;
$upcoming_message = ($f=get_field("upcoming_message",$msg_post_id)) ? (object) $f[0] : null;

if(!$last_weekend||!$upcoming_message) {
    return;
}

?>

<section class="upcoming-message">
    <div class="row">
        <div class="small-12 columns">
            <div>
                <?php if($upcoming_message->image) { ?>
                <a href="<?php echo esc_attr($upcoming_message->url); ?>">
                  <img src="<?php echo esc_attr($upcoming_message->image['sizes']['large']); ?>" alt="" title="" />
                </a>
                <?php } ?>
                <?php if($upcoming_message->subtitle) { ?>
                <p><?php echo esc_html($upcoming_message->subtitle); ?></p>
                <?php } ?>
                <a href="#" class="button" data-target="new-window">Learn More</a>
            </div>
        </div>
    </div>
</section>
