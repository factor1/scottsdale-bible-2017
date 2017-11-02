<?php if(!isset($wp)) { return; }

//vars
$title = get_sub_field('title');
$image = get_sub_field('featured_image');
$text = get_sub_field('text');
$button_option = get_sub_field('show_button_option');

?>
<section class="callout3">
    <div class="row">
      <div class="small-12 medium-5 large-3 columns">
          <img class="callout3-image" src="<?php echo esc_attr($image['sizes']['large']); ?>" />
      </div>
        <div class="small-12 medium-7 large-9 columns">
            <h1><?php echo $title ?></h1>
            <p><?php echo $text ?></p>
            <?php if($button_option === true) { ?>
              <?php if( have_rows ('buttons') ) { ?>
                <?php while ( have_rows('buttons') ) : the_row();

                // vars
                $button = get_sub_field('button_text');
                $button_link = get_sub_field('button_link');

                ?>
                <a href="<?php echo $button_link; ?>" class="button" data-target="new-window"><?php echo $button; ?></a>
                <?php endwhile; ?>
              <?php }  ?>
            <?php } ?>
        </div>
    </div>
    <div class="row">
      <div class="columns small-8 small-centered">
        <hr>
      </div>
    </div>
</section>
