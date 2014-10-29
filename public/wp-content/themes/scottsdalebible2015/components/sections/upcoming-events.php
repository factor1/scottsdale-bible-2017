<?php if(!isset($wp)) { return; }

$events = sb_get_upcoming_events();

if(!$events) {
    return;
}

?>
<section class="upcoming-events">
    <h1><i class="fa fa-calendar"></i>Upcoming <span>Events</span></h1>
    <div class="row">
        <ul class="small-block-grid-1 large-block-grid-2">
            <?php foreach($events as $event) { ?>
            <li>
                <div class="row">
                    <?php if($image=get_field("featured_image",$event->ID)) { ?>
                    <div class="small-3 columns">
                        <img src="<?php echo esc_attr($image['sizes']['thumbnail']); ?>" alt="" title="" />
                    </div>
                    <?php } ?>
                    <div class="small-9 columns">
                        <h3>
                            <a href="<?php echo get_permalink($event->ID); ?>"><?php echo esc_html($event->post_title); ?></a>
                        </h3>
                        <?php if($field=get_field("event_subtitle",$event->ID)) { ?>
                        <h5><?php echo esc_html($field); ?></h5>
                        <?php } ?>
                        <?php if($field=get_field("event_excerpt",$event->ID)) { ?>
                        <div>
                            <?php echo $field; ?>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </li>
            <?php } ?>
        </ul>
    </div>
    <div class="row">
        <a href="<?php echo get_option('siteurl'); ?>/events/" class="button dark-brown">See <span>all</span> events</a>
    </div>
</section>