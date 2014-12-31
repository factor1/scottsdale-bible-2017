<?php if(!isset($wp)) { return; }

if(!isset($post)) {
    $post = get_queried_object();
}
$events_post_id = (get_field("use_homepage_events")) ? sb_get_homepage_post_id() : $post->ID;

/* Load Preset Events if Set */
$events = [];
if($upcoming_events = get_field("upcoming_events",$events_post_id)) {
    foreach($upcoming_events as $event) {
        $event =& $event['event'];
        $events[] = sb_load_all_event_data($event);
    }
}

/* No Preset, Load Most Recent Posts */
/* Inactive for Now
if(!$events) {
    $events = sb_get_upcoming_events();
}
*/

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
                    <div class="medium-6 columns">
                        <a href="<?php echo get_permalink($event->ID); ?>" class="image-block-center"><img src="<?php echo esc_attr($image['sizes']['event_home']); ?>" alt="" title="" /></a>
                    </div>
                    <?php } ?>
                    <div class="medium-6 columns">
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