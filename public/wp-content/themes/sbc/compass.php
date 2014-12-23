<?php
/*
Template Name: Compass
*/
?>

<?php get_header(); ?>
<?php 
//for calendar

$use_wide = array(65, 1927, 1940, 648);

if(in_array($post->ID, $use_wide))
{
	echo '<div id="content">';
}
else
{
	echo '<div id="content" class="narrowcolumn">';
}
?>
	
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<?php 
		//for calendar
if(in_array($post->ID, $use_wide))
{
	echo '<div>';
}
else
{
	echo '<div class="post" id="post-<?php the_ID(); ?>">';
}
?>
		<!--<?php
		if($post->post_parent)
		{
			$parent_post = get_post($post->post_parent);
			if($parent_post->post_parent)
			{
				$parent_title = get_the_title($parent_post->post_parent);
				$parent_permalink = get_permalink($parent_post->post_parent);
				echo '<a href="' . $parent_permalink . '">' . $parent_title . '</a>->';
			}
			$parent_title = get_the_title($post->post_parent);
			$parent_permalink = get_permalink($post->post_parent);
			echo '<a href="' . $parent_permalink . '">' . $parent_title . '</a>->';
			the_title();
		}
		?>-->
			<div class="entry">
			<?php 
			/*echo 'This post id: ' . $post->ID;
			echo '<br />';
			echo print_r($post->ancestors);
			echo '<br />';*/
			//if(fopen(get_bloginfo('siteurl') . '/wordpress/wp-content/themes/sbc/images/headers/' . $post->ID . '.jpg', 'r'))
			if(file_exists('./wordpress/wp-content/themes/sbc/images/headers/' . $post->ID . '.jpg'))
			{
				echo '<img src="/wordpress/wp-content/themes/sbc/images/headers/' . $post->ID . '.jpg" style="margin-left:-5px; margin-right:-5px" />';
			}
			else
			{
				if($post->ancestors)
				{
					foreach($post->ancestors as $ancestor_id)
					{
						if(file_exists('./wordpress/wp-content/themes/sbc/images/headers/' . $ancestor_id . '.jpg'))
						{
							echo '<img src="/wordpress/wp-content/themes/sbc/images/headers/' . $ancestor_id . '.jpg" style="margin-left:-5px; margin-right:-5px" />';
							break;
						}
					}
				}
			}
			
			?>
				<h1><?php the_title(); ?></h1>
				<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
				
				<?php

				$compass_files = array();
				if ($handle = opendir('./wordpress/wp-content/uploads/compass/'))
				{
					while (false !== ($file = readdir($handle)))
					{
						$extension = strtolower(substr(strrchr($file, '.'), 1)); 
						if($extension === 'pdf')
						{
							array_push($compass_files, $file);
						} 
					}
					closedir($handle); 
					arsort($compass_files);
				}
				if($compass_files)
				{
					$year;
					$prev_year;
					$count = 0;
					foreach($compass_files as $compass_file)
					{
						$year = substr($compass_file, 0, 4);
						if($year != $prev_year)
						{
							if($count != 0){echo '</ul>';}
							echo '<h2>' . $year . '</h2>';
							echo '<ul>';
						}
						$compass_date = mktime(0, 0, 0, substr($compass_file, 4, 2) + 1, 0, substr($compass_file, 0, 4));
						echo '<li><a href="/wordpress/wp-content/uploads/compass/' . $compass_file . '">' .  date('F Y', $compass_date) . '</a></li>';
						$prev_year = $year;
						if($count == sizeof($compass_files) - 1)
						{
							echo '</ul>';
						}
						$count++;
					}
				}
?>
				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

			</div>
			<?php comments_template(); ?>
		</div>
		
		<?php endwhile; endif; ?>

		<?php if(!in_array($post->ID, $use_wide)){ ?>
		<?php include(TEMPLATEPATH . '/right_col.php'); ?>
		
		<?php }?>
	</div>
<?php 
if(!in_array($post->ID, $use_wide))
{
	get_sidebar();
}
?>
<?php get_footer(); ?>