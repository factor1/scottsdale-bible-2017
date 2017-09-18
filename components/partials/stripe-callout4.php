<?php if(!isset($wp)) { return; }

//vars
$title = get_sub_field('title');
$image = get_sub_field('visitor_image');
$text = get_sub_field('text');
$button_option = get_sub_field('show_button_option');

?>
<section class="first-visit alternate">
    <div class="row">
        <div class="small-12 medium-8 medium-centered text-center columns">
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
    </div>
</section>
