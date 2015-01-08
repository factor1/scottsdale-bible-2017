<?php

$next_link = get_next_posts_link('&laquo; More Events');
$prev_link = get_previous_posts_link('Newer Events &raquo;');

?>
<?php if($next_link||$prev_link) { ?>
<div class="row">
    <div class="navigation">
        <div class="next-posts"><?php echo $next_link; ?></div>
        <div class="prev-posts"><?php echo $prev_link; ?></div>
    </div>
</div>
<?php } ?>