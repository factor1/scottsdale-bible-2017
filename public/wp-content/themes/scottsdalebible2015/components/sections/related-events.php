<?php // Related Events

global $post;
$post_slug=$post->post_name;

if( $post_slug == 'family' ){
  $post_slug = 'family-life';
} elseif ( $post_slug == 'special' ) {
  $post_slug = 'special-ministries';
} elseif ( $post_slug == 'worship' ) {
  $post_slug = 'worship-arts';
} elseif ( $post_slug == 'marriage' ) {
  $post_slug = 'marriage-ministry';
} elseif ( $post_slug == 'college' ) {
  $post_slug = 'college-group';
}

// WP_Query arguments
$args = array (
	'post_type'              => array( 'event' ),
	'event-categories'       => $post_slug,
  'posts_per_page'         => '4',
  'meta_query' => array( 'key' => '_start_ts', 'value' => current_time('timestamp'), 'compare' => '>=', 'type'=>'numeric' ),
	'orderby' => 'meta_value_num',
	'order' => 'ASC',
	'meta_key' => '_start_ts',
	'meta_value' => current_time('timestamp'),
	'meta_value_num' => current_time('timestamp'),
	'meta_compare' => '>='
);

// The Query
$query = new WP_Query( $args );

if( $query->have_posts() ):
?>
<div class="row">
  <div class="small-12 columns">
    <h2>Related Events</h2>
  </div>
</div>
<div class="row">
    <ul class="small-block-grid-1 large-block-grid-2 related-events">
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
    </ul>
</div>

<?php endif;?>
