<?php

$location = get_field('map_location');

if($location) {
    $address = preg_replace('#,\s*United States$#ismu','',$location['address']);
}

?>
    <footer>
        <div class="row">

            <div class="small-6 small-centered medium-4 medium-centered large-3 large-offset-1 large-uncentered columns small-text-center large-text-left">
                <img src="<?php echo get_template_directory_uri(); ?>/images/SBC-BlueWhite-logo.svg" alt="" title="" />
            </div>
            <div class="small-12 medium-6 large-4 large-uncentered columns small-text-center large-text-center">
                <div>For general information or our pastor-on-call:</div>
                <div><a href="#" class="button">(480) 824-7200</a></div>
                <?php if(isset($address)) { ?>
                <div><? echo esc_html($address); ?></div>
                <?php } ?>
            </div>
            <div class="small-12 medium-6 large-3 large-uncentered columns small-text-center large-text-right">
                <div>
                    <a href="mailto:info@scottsdalebible.com"><span>feedback@scottsdalebible.com</span></a>
                </div>
                <br>
                <div>
                    <a href="https://twitter.com/scottsdalebible"><i class="fa fa-twitter"></i></a>
                    <a href="https://www.facebook.com/scottsdalebible"><i class="fa fa-facebook"></i></a>
                    <a href="http://instagram.com/scottsdalebible"><i class="fa fa-instagram"></i></a>
                    <div class="hide">
                        <span class='st_facebook_large' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>'></span>
                        <span class='st_twitter_large' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>'></span>
                        <span class='st_email_large' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>'></span>
                        <span class='st_pinterest_large' st_title='<?php the_title(); ?>' st_url='<?php the_permalink(); ?>'></span>
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
        </section>
    </footer>
                <?php get_template_part("components/sections/footer_tracking"); ?>


<?php wp_footer(); ?>
</body>
</html>
