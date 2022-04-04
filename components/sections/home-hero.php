<?php if(!isset($wp)) { return; } ?>

<?php if( have_rows ('video_hero') ): the_row();
  // vars
  $title = get_sub_field('welcome_text');
  $video = get_sub_field('hero_video');
  $image = get_sub_field('poster_image');
  $url = $image['url'];

?>

<?php if( get_field('hero_type') == 'video' ): ?>

  <section class="featured-video featured-video--home" style="background: url(<?php echo $url;?>) center center/cover no-repeat;">
      <div class="row fullWidth">
          <div class="large-12 columns">


                  <video class="fullWidth" id="bgvid" autoplay poster="" loop muted>
                    <source src="<?php echo $video ?>" type="video/mp4">
                  </video>
                  <div class="row">
                    <div class="large-8 columns large-centered text-center hero-text-box">
                      <h1><?php echo $title ?></h1><br>

                      <?php while ( have_rows('button') ) : the_row();

                      // vars
                      $button = get_sub_field('button_text');
                      $button_link = get_sub_field('button_link');
                      $custom_link_toggle = get_sub_field('custom_link_toggle');
                      $custom_link = get_sub_field('custom_link');

                      ?>

                        <?php if ($custom_link_toggle): ?>
                          <a href="<?php echo $custom_link['url']; ?>" target="<?php echo $custom_link['target']; ?>" class="button-white"><?php echo $custom_link['title']; ?></a>
                        <?php else: ?>
                          <a href="<?php echo $button_link ?>" class="button-white"><?php echo $button ?></a>
                        <?php endif; ?>
                      
                      <?php endwhile; ?>

                    </div>
                  </div>
                  <?php endif;  ?>
          </div>
      </div>
  </section>
<?php endif;  ?>
