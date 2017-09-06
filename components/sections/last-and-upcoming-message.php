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
        <div class="medium-6 columns">
            <div>
                <div>
                    <h1><span>Current Message:</span> <?php echo esc_html($last_weekend->title); ?></h3>
                    <?php // Subtitle Option ?>
                    <?php if($last_weekend->subtitle) { ?>
                    <h5><?php echo esc_html($last_weekend->subtitle); ?></h5>
                    <?php } ?>
                    <?php // if($last_weekend->description) { ?>
                    <p><?php echo esc_html($last_weekend->description); ?>Donec rutrum congue leo eget malesuada. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Donec rutrum congue leo eget malesuada.</p>
                    <?php // } ?>
                    <br />
                    <a href="#" class="button-second" data-target="new-window">Messages</a>
                    <a href="#" class="button-second" data-target="new-window">Watch</a>
                </div>
                <?php if($upcoming_message) { ?>
                <div>
                    <h1><span>This Coming Weekend:</span> <?php // echo esc_html($upcoming_message->title); ?></h1>
                    <?php if($upcoming_message->subtitle) { ?>
                      <?php // echo "<p>" . esc_html($upcoming_message->subtitle) . "</p>"; ?>
                    <?php } ?>
                    <?php // if($upcoming_message->description) { ?>
                    <p><?php echo esc_html($upcoming_message->description); ?>Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.</p>
                    <?php // } ?>
                </div>
                <?php } ?>
            </div>
        </div>
        <?php } ?>
        <?php if($last_weekend) { ?>
        <div class="medium-6 columns">
            <?php if($last_weekend->image) { ?>
            <div class="img-holder">
              <a href="<?php echo esc_attr($last_weekend->url); ?>">
                <img src="<?php echo esc_attr($last_weekend->image['sizes']['large']); ?>" alt="" title="" />
              </a>
            </div>
            <?php } ?>
        </div>
        <?php } ?>
    </div>
</section>
