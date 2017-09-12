<?php if(!isset($wp)) { return; } ?>

<?php if( have_rows ('home_hero',5) ): ?>

<?php if ( have_rows('home_hero',5) ) : the_row();

// vars
$title = get_sub_field('welcome_text');
$video = get_sub_field('video');

?>
<section class="home-hero fullWidth" style="background: url(<?php echo esc_attr($video['sizes']['large']); ?>)">
    <div>
        <h1><?php echo $title ?></h1>

            <?php while ( have_rows('button') ) : the_row();

            // vars
            $button = get_sub_field('button_text');
            $button_link = get_sub_field('button_link');

            ?>
            <a href="<?php echo $button_link ?>" class="button button-involved" data-target="new-window"><?php echo $button ?></a>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</section>
<?php endif;  ?>
