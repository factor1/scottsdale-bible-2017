<?php if(!isset($wp)) { return; } ?>

<?php if($image=get_field("featured_image")) { ?>
<section class="featured-image">
    <div class="row">
        <div class="large-12 columns">
            <img src="<?php echo esc_attr($image['url']); ?>" alt="" title="" />
        </div>
    </div>
</section>
<?php } ?>