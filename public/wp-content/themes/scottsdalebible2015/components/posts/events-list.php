<section class="upcoming-events">
    <h1><i class="fa fa-calendar"></i>Upcoming <span>Events</span></h1>
    <div class="row">
        <ul class="small-block-grid-1 large-block-grid-2">
            <?php while(have_posts()) { the_post(); $event = get_post(); ?>
            <li>
                <div class="row">
                    <?php if($image=get_field("featured_image",$event->ID)) { ?>
                    <div class="medium-6 columns">
                        <a class="image-block-center" href="<?php echo get_permalink($event->ID); ?>"><img src="<?php echo esc_attr($image['sizes']['event_home']); ?>" alt="" title="" /></a>
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
                        <div class="event-excerpt">
                            <?php echo $field; ?>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </li>
            <?php } ?>
        </ul>
    </div>
    <?php get_template_part("components/posts/event-nav"); ?>
</section>