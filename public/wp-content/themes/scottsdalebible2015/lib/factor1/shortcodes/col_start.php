<? # span or (small,medium,large), features

$span = (isset($large)) ? $large : $span;

?>
<div class="<?php echo ((isset($small))?"small-".htmlentities($small)." ":"").
((isset($medium))?"medium-".htmlentities($medium)." ":""); ?>large-<?=htmlentities($span) ?> columns <?=htmlentities($features) ?>">