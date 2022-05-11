<?php

$location = get_field('map_location');

if($location) {
    $address = preg_replace('#,\s*United States$#ismu','',$location['address']);
}

    if( !is_page(53239) ) : ?>
      <footer>
          <div class="row">

              <div class="small-6 small-centered medium-4 medium-centered large-3 large-offset-1 large-uncentered columns small-text-center large-text-left">
                  <img src="<?php echo get_template_directory_uri(); ?>/images/2017SBClogo.png" alt="" title="" />
              </div>
              <div class="small-12 medium-6 large-4 large-uncentered columns small-text-center large-text-center">
                  <div>For general information or our pastor-on-call:</div>
                  <div><a href="tel:4808247200" class="button">480.824.7200</a></div>
                  <div style="padding-bottom: 10px">For Immediate Pastoral Care, our pastor-on-call:</div>
                  <div><a href="tel:4803344102" class="button">480.334.4102</a></div>
                  <?php if(isset($address)) { ?>
                  <div><? echo esc_html($address); ?></div>
                  <?php } ?>
              </div>
              <div class="small-12 medium-6 large-3 large-uncentered columns small-text-center large-text-right">
                  <div>
                      <a href="mailto:info@scottsdalebible.com"><span>info@scottsdalebible.com</span></a>
                  </div>
                  <br>
                  <div>
                      <a href="https://twitter.com/scottsdalebible"><i class="fa fa-twitter"></i></a>
                      <a href="https://www.facebook.com/scottsdalebible"><i class="fa fa-facebook"></i></a>
                      <a href="http://instagram.com/scottsdalebible"><i class="fa fa-instagram"></i></a>
                      <a href="https://www.youtube.com/user/scottsdalebible"><i class="fa fa-youtube"></i></a>
                      <div class="hide">
                          <span class='st_facebook_large' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>'></span>
                          <span class='st_twitter_large' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>'></span>
                          <span class='st_email_large' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>'></span>
                          <span class='st_youtube_large' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>'></span>
                      </div>
                  </div>
              </div>

          </div>
          <div class="row">
            <div class="small-12 large-10 large-centered columns">
              <hr class="gradient">
            </div>
          </div>
          <div class="row">
              <div class="small-10 small-centered columns">

                  <?php get_template_part("components/menus/footer-menu"); ?>

              </div>
          </div>
          <section>
              <span>&copy; Scottsdale Bible Church</span>
              <span>All Rights Reserved</span>
              <?php if( is_front_page() || is_page(62694) || is_singular('sb_campus') ) : ?>
                <span>Chat provider: <a href="https://www.livechat.com/success/" target="_blank">LiveChat</a></span>
              <?php endif; ?>
          </section>
      </footer>
    <?php endif; ?>

    <div id="campus-modal" class="campus-modal campus-modal--hidden">
      <div class="modal-box">
        <div class="text-center">
          <img src="<?php bloginfo('template_url');?>/images/SBCCOLOR@2x.png" alt="Scottsdale Bible">
        </div>
        <h5 class="text-center">
          Please select a campus:
        </h5>
        <div class="text-center" style="margin-top: 40px;">
          <a href="<?php echo get_home_url();?>/set-campus?campus=72" class="button" style="margin-right: 15px;"><i class="fa fa-map-marker" aria-hidden="true"></i> Shea Campus</a>
          <a href="<?php echo get_home_url();?>/set-campus?campus=74" class="button"> <i class="fa fa-map-marker" aria-hidden="true"></i> Cactus Campus</a>
        </div>
      </div>
    </div>

    <?php get_template_part("components/sections/banner");

    get_template_part("components/sections/footer_tracking"); ?>


<?php wp_footer(); ?>
</body>
</html>
