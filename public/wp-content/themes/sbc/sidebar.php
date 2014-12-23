	<div id="sidebar" class="front_box front_box-<?php echo $post->ID; ?> front_box-<?php echo $post->post_parent; ?>">
			<?php
  if($post->post_parent)
  {
	if($post->post_parent != 57 && $post->post_parent != 2)
	{
		$parent_title = get_the_title($post->post_parent);
		$title_string = '<h2><a href="' . get_permalink($post->post_parent) . '">' . $parent_title . '</a></h2>';
		$children = wp_list_pages("title_li=&child_of=".$post->post_parent."&echo=0");
	}
	else
	{
		$parent_title = get_the_title($post->ID);
		
		$children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0&depth=1");
		if(!$children)
		{
			$parent_title = get_the_title($post->post_parent);
			$children = wp_list_pages("title_li=&child_of=".$post->post_parent."&echo=0&depth=1");
		}
		$title_string = '<h2>' . $parent_title . '</h2>';
	}
  }
  else
  {
	$parent_title = get_the_title($post->ID);
	$title_string = '<h2>' . $parent_title . '</h2>';
	$children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0&depth=1");
  }
//the_category();
	echo $title_string;
  if ($children) { ?>
  <ul class="sidebar_nav">
  <?php echo $children; ?>
  </ul>

  <?php } ?>
	</div>