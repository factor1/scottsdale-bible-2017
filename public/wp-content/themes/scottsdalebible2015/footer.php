<?php

?>
    <footer>
        <div class="row">
            <div class="small-12 large-4 columns small-text-center large-text-left">
                <img src="<?php echo get_template_directory_uri(); ?>/images/sbclogo-white.png" alt="" title="" />
            </div>
            <div class="medium-6 large-4 columns">
                <div>For general information or our pastor-on-call:</div>
                <div><a href="#" class="button">(480) 824-7200</a></div>
            </div>
            <div class="medium-6 large-4 columns small-text-center large-text-right">
                <div>
                    <a href="mailto:feedback@scottsdalebible.com"><i class="fa fa-envelope"></i><span>feedback@scottsdalebible.com</span></a>
                </div>
                <div>
                    <a href="https://twitter.com/scottsdalebible"><i class="fa fa-twitter"></i></a>
                    <a href="https://www.facebook.com/scottsdalebible"><i class="fa fa-facebook"></i></a>
                    <a href="http://instagram.com/scottsdalebible"><i class="fa fa-instagram"></i></a>
                    <a href="http://www.flickr.com/photos/scottsdalebible"><i class="fa fa-flickr"></i></a>
                    <a href="<?php echo get_option('siteurl'); ?>/message"><i class="fa fa-microphone"></i></a>
                    <a href="<?php echo get_option('siteurl'); ?>/feed"><i class="fa fa-rss"></i></a>
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
            <div class="small-12 columns">
                <?php get_template_part("components/menus/footer-menu"); ?>
            </div>
        </div>
        <section>
            <span>&copy; Scottsdale Bible Church</span>
            <span>All Rights Reserved</span>
        </section>
    </footer>

<?php wp_footer(); ?>
</body>
</html>
