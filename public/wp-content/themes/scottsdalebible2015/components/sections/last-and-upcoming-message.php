<?php if(!isset($wp)) { return; } ?>

<section class="last-and-upcoming-message">
    <div class="row">
        <div class="large-7 columns">
            <div>
                <div>
                    <img src="http://placehold.it/608x340" alt="" title="" />
                </div>
                <div>
                    <h3><i class="fa fa-calendar"></i><span>Last Weekend:</span> WHAT JESUS SAID ABOUT YOU</h3>
                    <h5>Jamie Rasmussen | Mark 8:27-29</h5>
                </div>
            </div>
        </div>
        <div class="large-5 columns">
            <div>
                <div>
                    <img src="http://placehold.it/410x250" alt="" title="" />
                </div>
                <div>
                    <h3><i class="fa fa-calendar"></i><span>UPCOMING</span> MESSAGE:<br />AVENUES: FAITH & TRUST</h3>
                    <h5>Jamie Rasmussen | Mark 8:27-29</h5>
                </div>
                <div>
                    <a href="#"><i class="fa fa-envelope"></i></a>
                    <a href="<?php echo (($f=get_field("twitter_url","option"))?esc_attr($f):"#"); ?>"><i class="fa fa-twitter"></i></a>
                    <a href="<?php echo (($f=get_field("facebook_url","option"))?esc_attr($f):"#"); ?>"><i class="fa fa-facebook"></i></a>
                    <a href="<?php echo (($f=get_field("instagram_url","option"))?esc_attr($f):"#"); ?>"><i class="fa fa-instagram"></i></a>
                    <a href="<?php echo (($f=get_field("flickr_url","option"))?esc_attr($f):"#"); ?>"><i class="fa fa-flickr"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>