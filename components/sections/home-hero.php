<?php if(!isset($wp)) { return; } ?>

<?php if( get_field('hero_type', 5) == 'video' ): ?>

  <section class="featured-video">
      <div class="row fullWidth">
          <div class="large-12 columns">

                  <?php if( have_rows ('video_hero', 5) ): the_row();
                    // vars
                    $title = get_sub_field('welcome_text');
                    $video = get_sub_field('video');

                  ?>
                  <video class="fullWidth" autoplay poster="" loop muted>
                    <source src="<?php echo $video ?>" type="video/mp4">
                  </video>
                  <div class="text-center">
                    <h1><?php echo $title ?></h1>

                    <?php while ( have_rows('button') ) : the_row();

                    // vars
                    $button = get_sub_field('button_text');
                    $button_link = get_sub_field('button_link');

                    ?>
                    <a href="<?php echo $button_link ?>" class="button"><?php echo $button ?></a>
                    <?php endwhile; ?>

                  </div>
                  <?php endif;  ?>
          </div>
      </div>
  </section>
<?php endif;  ?>
