<?php if(!isset($wp)) { return; }

//vars
$title = get_sub_field('title');
$image = get_sub_field('featured_image');
$text = get_sub_field('text');
$button_option = get_sub_field('show_button_option');
$button = get_sub_field('button_text');
$button_link = get_sub_field('button_link');

?>
<section class="callout1">
    <div class="row">
        <div class="medium-12 large-6 columns">
            <h1><?php echo $title; ?></h1>
            <?php echo $text; ?>
            <?php if($button_option === true) { ?>
              <a href="<?php echo $button_link; ?>" class="button" data-target="new-window"><?php echo $button; ?></a>
            <?php } ?>
        </div>
        <div class="medium-12 large-6 columns">
            <img class="callout1-image" src="<?php echo esc_attr($image['sizes']['large']); ?>" />
        </div>
    </div>
    <div class="row">
      <div class="columns small-centered small-8">
        <hr>
      </div>
    </div>
</section>
