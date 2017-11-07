<?php if(!isset($wp)) { return; } ?>

<?php if( have_rows ('video_hero', 5) ): the_row();
  // vars
  $title = get_sub_field('welcome_text');
  $video = get_sub_field('video');
  $image = get_sub_field('poster_image');
  $url = $image['url'];

?>

<?php if( get_field('hero_type', 5) == 'video' ): ?>

  <section class="featured-video featured-video--home" style="background: url(<?php echo $url;?>) center center/cover no-repeat;">
      <div class="row fullWidth">
          <div class="large-12 columns">


                  <video class="fullWidth" id="bgvid" autoplay poster="" loop muted>
                    <source src="<?php echo $video ?>" type="video/mp4">
                  </video>
                  <div class="row">
                    <div class="large-6 columns text-center hero-text-box">
                      <h1><?php echo $title ?></h1>

                      <?php while ( have_rows('button') ) : the_row();

                      // vars
                      $button = get_sub_field('button_text');
                      $button_link = get_sub_field('button_link');

                      ?>
                      <a href="<?php echo $button_link ?>" class="button"><?php echo $button ?></a>
                      <?php endwhile; ?>

                    </div>
                  </div>
                  <?php endif;  ?>
          </div>
      </div>
  </section>
<?php endif;  ?>
