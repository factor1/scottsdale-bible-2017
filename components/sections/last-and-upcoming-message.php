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

<section class="last-and-upcoming-message">
    <div class="row">
        <?php if($last_weekend) { ?>
        <div class="large-6 columns">
            <div>
                <div>
                    <?php if($last_weekend->image) { ?>
                    <a href="<?php echo esc_attr($last_weekend->url); ?>">
                    <img src="<?php echo esc_attr($last_weekend->image['sizes']['large']); ?>" alt="" title="" />
                    </a>
                    <?php } ?>
                </div>
                <div>
                    <h1><span>Current Message:</span> <?php echo esc_html($last_weekend->title); ?></h3>
                    <?php // Subtitle Option ?>
                    <?php if($last_weekend->subtitle) { ?>
                    <h5><?php echo esc_html($last_weekend->subtitle); ?></h5>
                    <?php } ?>
                    <?php if($last_weekend->description) { ?>
                    <p><?php echo esc_html($last_weekend->description); ?></p>
                    <?php } ?>
                </div>
                <div>
                    <h3><i class="fa fa-calendar"></i><span>UPCOMING MESSAGE:</span> <?php echo esc_html($upcoming_message->title); ?></h3>
                    <?php if($upcoming_message->subtitle) { ?>
                    <h5><?php echo esc_html($upcoming_message->subtitle); ?></h5>
                    <?php } ?>
                </div>

            </div>
        </div>
        <?php } ?>
        <?php if($upcoming_message) { ?>
        <div class="large-6 columns">
            <div>
                <div>
                    <?php if($upcoming_message->image) { ?>
                    <img src="<?php echo esc_attr($upcoming_message->image['sizes']['large']); ?>" alt="" title="" />
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</section>
