<?php
/*
Template Name: Events List
*/

get_header();

$campuses_ids = array(188,297,270,190,294,289);
$img = get_field("featured_image",sb_get_eventspage_post_id());
$headline = is_tax('event-categories', 'on-campus-classes') ? 'Classes' : 'Events';
$cats = get_terms( array('taxonomy' => 'event-categories', 'exclude' => $campuses_ids ) );
$campuses = get_terms( array('taxonomy' => 'event-categories', 'include' => $campuses_ids ) );
$current = get_queried_object()->slug; ?>

<section class="featured-image" style="background: #E9ECF1 url('<?php echo esc_attr($img['url']); ?>') center/cover no-repeat">
  <div class="row">
    <h1 class="text-center"><?php echo $headline; ?></h1>

    <div class="dropdown">
      <div class="dropdown__parent">
        <p>Filter events by campus or category</p> <i class="fa fa-caret-down" aria-hidden="true"></i>
      </div>

      <div class="dropdown__menu text-left">
        <p><strong>Campuses</strong></p>

        <?php foreach($campuses_ids as $campus_id) :
          // order the items based in the campuses_ids array
          $key_in_campuses = array_search($campus_id, array_column($campuses, 'term_id'));
          $campus = $campuses[$key_in_campuses];
          $activeClass = $current === $campus->slug ? ' class="active"' : ''; ?>

          <p<?php echo $activeClass; ?>><a href="<?php echo get_term_link($campus); ?>"><?php echo $campus->name; ?></a></p>

        <?php endforeach; ?>

        <br>

        <p><strong>Categories</strong></p>

        <?php foreach($cats as $cat) :
          $activeClass = $current === $cat->slug ? ' class="active"' : ''; ?>

          <p<?php echo $activeClass; ?>><a href="<?php echo get_term_link($cat); ?>"><?php echo $cat->name; ?></a></p>

        <?php endforeach; ?>

      </div>
    </div>
  </div>
</section>

<?php $wp_query = new WP_Query([
    'post_type'=>'event',
    'post_per_page'=> -1,
    'orderby' => 'meta_value',
    'meta_key' => '_event_start_date',
    'order' => 'ASC',
    'meta_query' => [
        [
            'key' => '_event_start_date',
            'value' => date("Y-m-d"),
            'compare' => '>='
        ]
    ]
]);

?>
<?php if(have_posts()) { ?>
<?php get_template_part("components/posts/events-list"); ?>
<?php } else { ?>
<section class="posts-archive">
    <div class="row">
        <h3>No events found</h3>
    </div>
</section>
<?php } ?>
<?php

get_footer();
