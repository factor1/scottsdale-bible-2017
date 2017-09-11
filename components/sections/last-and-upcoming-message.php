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
        <div class="small-12 medium-12 large-6 columns">
            <div>
                <div>
                    <h1><span>Current Message:</span> <?php echo esc_html($last_weekend->title); ?></h3>
                    <?php // Subtitle Option ?>
                    <?php if($last_weekend->subtitle) { ?>
                    <h5><?php // echo esc_html($last_weekend->subtitle); ?></h5>
                    <?php } ?>
                    <?php // if($last_weekend->description) { ?>
                    <p><?php echo esc_html($last_weekend->description); ?></p>
                    <?php // } ?>
                    <br />
                    <a href="/message" class="button-second" data-target="new-window">Messages</a>
                    <a href="/live" class="button-second" data-target="new-window">Watch</a>
                </div>
                <?php if($upcoming_message) { ?>
                <div>
                    <h6><span>This Coming Weekend:</span> <?php // echo esc_html($upcoming_message->title); ?></h6>
                    <?php if($upcoming_message->subtitle) { ?>
                      <?php // echo "<p>" . esc_html($upcoming_message->subtitle) . "</p>"; ?>
                    <?php } ?>
                    <?php // if($upcoming_message->description) { ?>
                    <p><?php echo esc_html($upcoming_message->description); ?></p>
                    <?php // } ?>
                </div>
                <?php } ?>
            </div>
        </div>
        <?php } ?>
        <?php if($last_weekend) { ?>
        <div class="small-12 medium-12 large-6 columns" >
            <?php if($last_weekend->image) { ?>
            <div class="img-holder" style="background-image: url(<?php echo esc_attr($last_weekend->image['sizes']['large']); ?>);">
              <a href="<?php echo esc_attr($last_weekend->url); ?>">

              </a>
            </div>
            <?php } ?>
        </div>
        <?php } ?>
    </div>
</section>
