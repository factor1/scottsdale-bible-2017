<?php if(!isset($wp)) { return; } ?>
<?php if( have_rows ('plan_your_visit', 5) ): ?>
<section class="general-info">
    <div class="row">
        <ul class="small-block-grid-1 medium-block-grid-2 large-block-grid-3">
            <?php while ( have_rows('plan_your_visit', 5) ) : the_row();

            // vars
            $image = get_sub_field('image');
            $venue = get_sub_field('name');
            $button = get_sub_field('button_text');
            $button_link = get_sub_field('button_link');

            ?>
            <li>
                <div class="row">
                    <div class="medium-12 columns box-section" style="background-image: url(<?php echo esc_attr($image['sizes']['large']); ?>);">
                        <div class="box-section-text">
                            <h2><?php echo $venue ?></h2>
                            <a href="<?php echo $button_link ?>" class="button" data-target="new-window"><?php echo $button ?></a>
                        </div>
                    </div>
                </div>
            </li>
            <?php endwhile; ?>
        </ul>
    </div>
</section>
<?php endif;  ?>
