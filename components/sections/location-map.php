<?php if(!isset($wp)) { return; } ?>

<?php

$campuses = get_posts([
    'posts_per_page' => -1,
    'post_type' => 'sb_campus',
    'post_status' => 'publish',
]);

foreach($campuses as $campus) {
    $campus->location = get_field('map_location',$campus->ID);
}

?>

<?php if($campuses) { ?>
<section class="location-map">
  <hr>
  <div class="row">
    <div class="small-12">
      <h1>Locations</h1>
      <div class="map-container" data-key="AIzaSyDcfTeMU46OPl-bKqzNPQVAxhgt7qs_HbA" data-height="500" data-zoom="11" data-lat="<?php echo round($campuses[0]->location['lat'],3); ?>" data-lng="<?php echo round($campuses[0]->location['lng'],3); ?>">
      </div>
      <?php foreach($campuses as $campus) { ?>
      <div class="map-location"
      data-lat="<?php echo round($campus->location['lat'],3); ?>"
      data-lng="<?php echo round($campus->location['lng'],3); ?>"
      data-icon="<?php echo get_template_directory_uri()."/images/icons/map-pin.png"; ?>"
      >
          <h3><?php echo esc_html($campus->post_title); ?></h3>
      </div>
      <?php } ?>
    </div>
  </div>
</section>
<br style="clear:both" />
<?php } ?>
