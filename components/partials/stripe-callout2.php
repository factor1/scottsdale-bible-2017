<?php if(!isset($wp)) { return; }

//vars
$title = get_sub_field('title');
$image = get_sub_field('featured_image');
$button_option = get_sub_field('show_button_option');
$button = get_sub_field('button_text');
$button_link = get_sub_field('button_link');

?>
<section class="welcome">
    <div class="row">
        <div class="medium-12 large-6 columns">
            <img src="<?php echo esc_attr($image['sizes']['large']); ?>" />
        </div>
        <div class="medium-12 large-6 columns">
            <h1><?php echo $title ?></h1>
            <p>We are a nondenominational church in Scottsdale, Arizona, welcoming people of all ages and backgrounds. Our desire is to provide a place for you and everyone in your family to connect, find purpose, and grow in relationship with God and others.</p>
            <p><a href="#">Click here</a> to see a booklet that overviews our church.</p>
            <p>We offer seven weekend services at our Shea Campus and two at our Cactus Campus. Each service includes engaging worship music and Bible-based teaching with real life application. We also offer opportunities throughout the week for you to grow in community and partner with others to impact our community and world.</p>
            <?php if($button_option === true) { ?>
              <a href="<?php echo $button_link; ?>" class="button" data-target="new-window"><?php echo $button; ?></a>
            <?php } ?>
        </div>
    </div>
    <div class="row">
      <div class="columns small-centered small-8">
        <hr>
      </div>
    </div>
</section>
<?php endif;  ?>
