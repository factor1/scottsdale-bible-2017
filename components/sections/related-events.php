<?php // Related Events

global $post;
$post_slug=$post->post_name;

if( $post_slug == 'family' ){
  $post_slug = 'family-life';
} elseif ( $post_slug == 'special' ) {
  $post_slug = 'special-ministries';
} elseif ( $post_slug == 'worship-and-creative-arts' ) {
  $post_slug = 'worship-arts';
  } elseif ( $post_slug == 'worship' ) {
  $post_slug = 'worship-arts';
} elseif ( $post_slug == 'marriage' ) {
  $post_slug = 'marriage-ministry';
} elseif ( $post_slug == 'college' ) {
  $post_slug = 'college-group';
} elseif ( $post_slug == 'cactuswomen' ) {
  $post_slug = 'cactus-women';
}

// WP_Query arguments
$args = array (
	'post_type'              => array( 'event' ),
	'event-categories'       => $post_slug,
  'posts_per_page'         => '6',
  'meta_query' => array(
    'key' => '_end_ts', 
    'value' => current_time('timestamp'),
    'compare' => '>=',
    'type'=>'numeric'
  ),
	'orderby' => 'meta_value_num',
	'order' => 'ASC',
	'meta_key' => '_end_ts',
	'meta_value' => current_time('timestamp'),
	'meta_value_num' => current_time('timestamp'),
	'meta_compare' => '>='
);

// The Query
$query = new WP_Query( $args );

if( $query->have_posts() ):
?>
<section class="upcoming-events upcoming-events-flexible">
  <div class="row">
    <div class="small-12 columns sm-text-center">
      <h2>Upcoming Events</h2>
    </div>
  </div>
  <div class="row">
      <?php /* <ul class="small-block-grid-1 large-block-grid-2 related-events">
          <?php while( $query->have_posts()) {  $query->the_post(); $event = get_post(); ?>
          <li>
              <div class="row">
                  <?php if($image=get_field("featured_image",$event->ID)) { ?>
                  <div class="medium-6 columns related-events-img">
                      <a href="<?php echo get_permalink($event->ID); ?>"><img src="<?php echo esc_attr($image['sizes']['event_home']); ?>" alt="" title="" /></a>
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
      </ul> */ ?>

      <ul class="small-block-grid-2 large-block-grid-3">
          <?php while($query->have_posts()) {  $query->the_post(); $event = get_post();
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

<?php endif; wp_reset_postdata(); ?>
