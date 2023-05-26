<?php if(!isset($wp)) { return; }

$intro = get_field('get_involved_intro'); ?>

<?php if( have_rows ('get_involved') ): ?>
<section class="get-involved">
    <div class="row">
        <div class="small-12 columns">
            <div>
                <?php echo $intro; ?>
                <?php while ( have_rows('get_involved') ) : the_row();

                // vars
                $button = get_sub_field('button_text');
                $button_link = get_sub_field('button_link');

                ?>
                <a href="<?php echo $button_link ?>" class="button-white button-involved" data-target="new-window"><?php echo $button ?></a>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
</section>
<?php endif;  ?>
