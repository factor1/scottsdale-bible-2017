<?php if(!isset($wp)) { return; }

if(!isset($post)) {
    $post = get_queried_object();
}
$msg_post_id = (get_field("use_homepage_messages")) ? sb_get_homepage_post_id() : $post->ID;

$last_weekend = ($f=get_field("last_weekend_message",$msg_post_id)) ? (object) $f[0] : null;


if(!$last_weekend) {
    return;
}

?>
<?php if($last_weekend) { ?>
<section class="last-and-upcoming-message">
    <div class="row">
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
                    <a href="/message" class="button-second">Messages</a>
                    <a href="<?php echo esc_attr($last_weekend->url); ?>" class="button-second">Watch</a>
                </div>
                <div>
                    <h6><span>This Coming Weekend:</span>
                    <?php // if($upcoming_message->description) { ?>
                    <p><?php echo esc_html($last_weekend->upcoming_info); ?></p>
                    <?php // } ?>
                </div>
            </div>
        </div>
        <div class="small-12 medium-12 large-6 columns" >
            <?php if($last_weekend->image) { ?>
              <a href="<?php echo esc_attr($last_weekend->url); ?>" style="display:block; height:100%; margin:0">
                <div class="img-holder" style="background-image: url(<?php echo esc_attr($last_weekend->image['sizes']['large']); ?>);">
              </a>
            </div>
            <?php } ?>
        </div>
    </div>
</section>
<?php } ?>
