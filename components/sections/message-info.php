<?php if(!isset($wp)) { return; } ?>

<?php if( have_rows ('live_message') ): the_row();

// vars
$title = get_sub_field('title');
$text = get_sub_field('message_text');

?>
<section class="message-info">
    <div class="row">
        <div class="small-12 medium-9 columns">
            <div>
                <h1><?php echo $title ?></h1>
                <?php echo $text ?>
            </div>
        </div>
      <div class="small-12 medium-3 columns">
        <ul class="small-block-grid-1">
          <?php if( have_rows ('side_buttons') ): ?>
            <?php while ( have_rows('side_buttons') ) : the_row();

            // vars
            $image = get_sub_field('image');
            $title = get_sub_field('title');
            $link = get_sub_field('page_link');

            ?>
            <li>
              <div class="row">
                <a href="<?php echo $link ?>" data-target="new-window">
                  <div class="medium-12 columns side-blocks" style="background-image: url(<?php echo esc_attr($image['sizes']['large']); ?>);">
                      <div class="">
                          <h2><?php echo $title ?></h2>
                      </div>
                  </div>
                </a>
              </div>
            </li>
            <?php endwhile; ?>
          <?php endif;  ?>
        </ul>
      </div>
    </div>
</section>
<?php endif;  ?>
