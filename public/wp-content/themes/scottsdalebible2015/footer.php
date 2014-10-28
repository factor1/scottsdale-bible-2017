<?php

?>
    <footer>
        <div class="row">
            <div class="large-4 columns">
                <img src="<?php echo get_template_directory_uri(); ?>/images/sbclogo-white.png" alt="" title="" />
            </div>
            <div class="large-4 columns">
                <div>For general information or our pastor-on-call:</div>
                <div><a class="button">(480) 824-7200</a></div>
            </div>
            <div class="large-4 columns">
                <div>
                    <a href="mailto:feedback@scottsdalebible.com"><i class="fa fa-envelope"></i><span>feedback@scottsdalebible.com</span></a>
                </div>
                <div>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-camera"></i></a>
                    <a href="#"><i class="fa fa-flickr"></i></a>
                    <a href="#"><i class="fa fa-microphone"></i></a>
                    <a href="#"><i class="fa fa-rss"></i></a>
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
