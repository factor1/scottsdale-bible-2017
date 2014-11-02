<?php if(!isset($wp)) { return; }

$last_weekend = get_field("last_weekend_message");
$upcoming_message = get_field("upcoming_message");

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
                    <?php if($image=get_field("featured_image",$last_weekend->ID)) { ?>
                    <img src="<?php echo esc_attr($image['sizes']['large']); ?>" alt="" title="" />
                    <?php } ?>
                </div>
                <div>
                    <h3><i class="fa fa-calendar"></i><span>Last Weekend:</span> <?php echo esc_html($last_weekend->post_title); ?></h3>
                    <?php if($field=get_field("subtitle",$last_weekend->ID)) { ?>
                    <h5><?php echo esc_html($field); ?></h5>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php } ?>
        <?php if($upcoming_message) { ?>
        <div class="large-5 columns">
            <div>
                <div>
                    <?php if($image=get_field("featured_image",$upcoming_message->ID)) { ?>
                    <img src="<?php echo esc_attr($image['sizes']['medium']); ?>" alt="" title="" />
                    <?php } ?>
                </div>
                <div>
                    <h3><i class="fa fa-calendar"></i><span>UPCOMING</span> MESSAGE:<br /><?php echo esc_html($upcoming_message->post_title); ?></h3>
                    <?php if($field=get_field("subtitle",$upcoming_message->ID)) { ?>
                    <h5><?php echo esc_html($field); ?></h5>
                    <?php } ?>
                </div>
                <div>
                    <a href="#"><i class="fa fa-envelope"></i></a>
                    <a href="<?php echo (($f=get_field("twitter_url","option"))?esc_attr($f):"#"); ?>"><i class="fa fa-twitter"></i></a>
                    <a href="<?php echo (($f=get_field("facebook_url","option"))?esc_attr($f):"#"); ?>"><i class="fa fa-facebook"></i></a>
                    <a href="<?php echo (($f=get_field("instagram_url","option"))?esc_attr($f):"#"); ?>"><i class="fa fa-instagram"></i></a>
                    <a href="<?php echo (($f=get_field("flickr_url","option"))?esc_attr($f):"#"); ?>"><i class="fa fa-flickr"></i></a>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</section>