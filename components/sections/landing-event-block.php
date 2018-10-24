<?php if(!isset($wp)) { return; }

// vars
$landing_event_header = get_sub_field('landing_event_header');
$landing_event_image = wp_get_attachment_image_src(get_sub_field('landing_event_image'), 'landing_ev_img');
?>

<section class="g-container landing--event_img" style="background:url('<?php echo $landing_event_image[0]; ?>') center/cover no-repeat" data-parallax="scroll">

  <div class="g-row">
    <div class="g-col-10 g-col-centered text-center">
      <h1 class="landing--event_header"><?php echo $landing_event_header; ?></h1>
    </div>
    <?php if(have_rows('landing_event_details')):?>
      <?php while(have_rows('landing_event_details')): the_row();
      $event_location = get_sub_field('landing_event_location');
      $event_date = get_sub_field('landing_event_date');
      $event_time = get_sub_field('landing_event_time');
      ?>
      <div class="g-col-3 g-sm-col-6 text-center event-container">
        <div class="event__block">
          <?php echo $event_location; ?>
        </div>
        <div class="event__block">
          <?php echo $event_date; ?>
        </div>
        <div class="event__block">
          <?php echo $event_time; ?>
        </div>
      </div>
      <?php endwhile;?>
    <?php endif;?>
  </div>
</section>
