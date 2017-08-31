<?php if(!isset($wp)) { return; }

if(!isset($post)) {
    $post = get_queried_object();
}

if(!($category = get_field("events_category",$post->ID))) {
    return;
}

$events = sb_get_upcoming_events([
    'tax_query' => [
        [
            'taxonomy' => 'event-categories',
            'field' => 'term_id',
            'terms' => [$category->term_id]
        ]
    ]
]);


if(!$events) {
    return;
}

$events_link = get_term_link($category);

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
        <a href="<?php echo esc_attr($events_link); ?>" class="button dark-brown">See <span>all</span> events</a>
    </div>
</section>