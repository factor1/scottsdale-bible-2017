<?php if(!isset($wp)) { return; }

$campuses = sb_get_campuses();

if(!$campuses) {
    return;
}

?>
<section class="select-campus">
    <div class="row">
        <ul class="no-bullet">
            <li>
                <h3>Select <span>your</span> campus <i class="fa fa-chevron-down"></i></h3>
            </li>
            <?php foreach($campuses as $campus) { $campus_name = explode(" ",$campus->post_title); ?>
            <li>
                <a href="<?php echo get_permalink($campus->ID); ?>">
                    <span><?php echo esc_html(array_shift($campus_name)); ?></span> <?php echo esc_html(implode(" ",$campus_name)); ?>
                </a>
            </li>
            <?php } ?>
        </ul>
    </div>
</section>