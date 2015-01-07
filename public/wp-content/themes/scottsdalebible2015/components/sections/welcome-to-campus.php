<?php if(!isset($wp)) { return; } ?>
<section class="welcome-to-campus">
    <div class="row">
        <div class="small-12 columns">
            <div>
                <h2>Welcome to <span><?php echo get_the_title(); ?>!</span> <?php echo esc_html(get_field("service_times")); ?></h2>
                <?php if($map=get_field("map_location")) { $place = urlencode($map['address'])."/@".$map['lat'].",".$map['lng'].",14z/"; ?>
                <p>
                    <a href="https://www.google.com/maps/place/<?php echo $place; ?>" class="button light-brown" data-target="new-window">Directions</a>
                </p>
                <?php } ?>
            </div>
        </div>
    </div>
</section>