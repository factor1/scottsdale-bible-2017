<?php if(!isset($wp)) { return; } ?>

<section class="welcome-to-campus">
    <div class="row">
        <div class="small-12 columns">
            <h2>Welcome to <span><?php echo get_the_title(); ?>!</span> <?php echo esc_html(get_field("service_times")); ?></h2>
        </div>
    </div>
</section>