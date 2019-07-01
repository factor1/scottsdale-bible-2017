<section class="upcoming-events">
  <div class="row">
      <ul class="small-block-grid-2 large-block-grid-3">
          <?php while(have_posts()) { the_post(); $event = get_post();
            $img = get_field("featured_image", $event->ID); ?>
            <li>
              <a href="<?php echo get_permalink($event->ID); ?>" class="upcoming-events__tile" style="background: url('<?php echo esc_attr($img['sizes']['event_home']); ?>') center/cover no-repeat">
                <div>
                  <div>
                    <?php if($field=get_field("event_subtitle",$event->ID)) { ?>
                      <h5><?php echo esc_html($field); ?></h5>
                    <?php } ?>
                  </div>

                  <?php if($field=get_field("event_excerpt",$event->ID)) {
                    echo $field;
                  } ?>
                </div>
              </a>
            </li>
          <?php } ?>
      </ul>
  </div>
</section>
