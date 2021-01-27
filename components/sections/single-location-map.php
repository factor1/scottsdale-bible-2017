<?php if(!isset($wp)) { return; } ?>

<?php
  $intro = get_sub_field('single_campus_intro_content');
  $campus = get_sub_field('single_campus_map');
  $map = get_field('map_location', $campus);
  $map_link = get_field('map_link', $campus);
  $title = get_the_title($campus);
?>

<?php if($map) { ?>
<section class="location-map">
  <div class="row">
    <div class="columns small-centered small-8">
      <?php echo $intro; ?>
      <hr>
    </div>
  </div>
  <div class="row">
    <div class="small-12">
      <div class="map-container" data-key="AIzaSyD3juZh1Id66Q5rRRy68LlwBkr_FyDcQMY" data-height="500" data-zoom="10" data-lat="<?php echo round($map['lat'],3); ?>" data-lng="<?php echo round($map['lng'],3); ?>">
      </div>
      <div class="map-location"
      data-lat="<?php echo round($map['lat'],3); ?>"
      data-lng="<?php echo round($map['lng'],3); ?>"
      data-icon="<?php echo get_template_directory_uri()."/images/icons/map-pin2019.png"; ?>"
      >
        <a href="<?php echo $map_link; ?>"><h3><?php echo esc_html($title); ?></h3></a>
      </div>
    </div>
  </div>
</section>
<br style="clear:both" />
<?php } ?>