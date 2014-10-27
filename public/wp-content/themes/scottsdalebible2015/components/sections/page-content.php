<?php if(!isset($wp)) { return; } ?>

<section class="page-content">
    <div class="row">
        <?php if($sidebar=sb_get_sidebar()) { ?>
        <div class="large-3 columns sidebar">
            <?php echo $sidebar; ?>
        </div>
        <div class="large-9 columns">
        <?php } else { ?>
        <div class="large-12 columns">
        <?php } ?>
            <?php get_template_part("components/posts/article"); ?>
        </div>
    </div>
</section>