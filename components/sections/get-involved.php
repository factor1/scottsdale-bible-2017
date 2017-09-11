<?php if(!isset($wp)) { return; } ?>

<?php if( have_rows ('get_involved') ): ?>
<section class="get-involved">
    <div class="row">
        <div class="small-12 columns">
            <div>
                <h1>Get Involved</h1>
                <p>
                  <?php while ( have_rows('get_involved') ) : the_row();

                  // vars
                  $button = get_sub_field('button_text');
                  $button_link = get_sub_field('button_link');

                  ?>
                  <a href="<?php echo $button_link ?>" class="button-second" data-target="new-window"><?php echo $button ?></a>
                  <?php endwhile; ?>
                </p>
            </div>
        </div>
    </div>
</section>
<?php endif;  ?>
