<?php if(!isset($wp)) { return; }

//vars
$title = get_sub_field('title');
$text = get_sub_field('text');
$image = get_sub_field('featured_image');
$button_option = get_sub_field('show_button_option');
$button = get_sub_field('button_text');
$button_link = get_sub_field('button_link');

?>
<section class="callout2">
    <div class="row">
        <div class="medium-12 large-6 columns">
            <img class="callout2-image" src="<?php echo esc_attr($image['sizes']['large']); ?>" />
        </div>
        <div class="medium-12 large-6 columns">
            <h1><?php echo $title ?></h1>
            <?php echo $text; ?>
            <?php if($button_option === true) { ?>
              <a href="<?php echo $button_link; ?>" class="button" data-target="new-window"><?php echo $button; ?></a>
            <?php } ?>
        </div>
    </div>
</section>
