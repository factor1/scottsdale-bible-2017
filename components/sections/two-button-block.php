<?php if(!isset($wp)) { return; }

// vars
$two_button_header = get_sub_field('two_button_header');
$two_button_subheader = get_sub_field('two_button_subheader');
$two_button_content = get_sub_field('two_button_content');
$button_link1 = get_sub_field('button_link_one');
$button_link2 = get_sub_field('button_link_two');

?>

<section style="padding:55px 0 65px 0;" class="g-container">
    <div class="g-row">
        <div class="g-col-12 g-col-centered text-center">
            <div style="margin:0;">
                <h1><?php echo $two_button_header; ?></h1>
                <div class="landing-subheader">
                  <?php echo $two_button_subheader; ?>
                </div>
                <div class="landing-content">
                  <?php echo $two_button_content; ?>
                </div>
                <div style="padding-top: 50px;">
                  <a style="margin: 10px 20px;" href="<?php echo $button_link1['url'] ?>" class="button-second button-involved" data-target="new-window"><?php echo $button_link1['title'] ?></a>
                  <a style="margin: 10px 20px;" href="<?php echo $button_link2['url'] ?>" class="button-second button-involved" data-target="new-window"><?php echo $button_link2['title'] ?></a>
                </div>
            </div>
        </div>
    </div>
</section>
