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
        <div class="large-7 columns">
            <div>
                <div>
                    <?php if($last_weekend->image) { ?>
                    <img src="<?php echo esc_attr($last_weekend->image['sizes']['large']); ?>" alt="" title="" />
                    <?php } ?>
                </div>
                <div>
                    <h3><i class="fa fa-calendar"></i><span>Last Weekend:</span> <?php echo esc_html($last_weekend->title); ?></h3>
                    <?php if($last_weekend->subtitle) { ?>
                    <h5><?php echo esc_html($last_weekend->subtitle); ?></h5>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php } ?>
        <?php if($upcoming_message) { ?>
        <div class="large-5 columns">
            <div>
                <div>
                    <?php if($upcoming_message->image) { ?>
                    <img src="<?php echo esc_attr($upcoming_message->image['sizes']['medium']); ?>" alt="" title="" />
                    <?php } ?>
                </div>
                <div>
                    <h3><i class="fa fa-calendar"></i><span>UPCOMING MESSAGE:</span> <?php echo esc_html($upcoming_message->title); ?></h3>
                    <?php if($upcoming_message->subtitle) { ?>
                    <h5><?php echo esc_html($upcoming_message->subtitle); ?></h5>
                    <?php } ?>
                </div>
                <div>
                    <a href="#" data-trigger-click="st_email_large"><i class="fa fa-envelope"></i></a>
                    <a href="#" data-trigger-click="st_twitter_large"><i class="fa fa-twitter"></i></a>
                    <a href="#" data-trigger-click="st_facebook_large"><i class="fa fa-facebook"></i></a>
                    <a href="<?php echo (($f=get_field("instagram_url","option"))?esc_attr($f):"#"); ?>"><i class="fa fa-instagram"></i></a>
                    <a href="<?php echo (($f=get_field("flickr_url","option"))?esc_attr($f):"#"); ?>"><i class="fa fa-flickr"></i></a>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</section>