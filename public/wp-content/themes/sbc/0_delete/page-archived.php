<?php 
/* Template Name: Archived default page */ ?>

<?php get_header(); ?>
<?php 
//for calendar

$use_wide = array(65, 1927, 1940, 648, 4430, 10065);

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
	echo '<div class="post post-' . $post->ID . ' post-' . $post->post_parent . '" id="post">';
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
				if(file_exists('./wordpress/wp-content/themes/sbc/images/headers/' . $post->ID . '.jpg'))
				{
					echo '<img src="/wordpress/wp-content/themes/sbc/images/headers/' . $post->ID . '.jpg" style="margin-left:-5px; margin-right:-5px" />';
				}
			}
			else if(file_exists('./wordpress/wp-content/themes/sbc/images/headers/' . $post->ID . '.png'))
			{
				echo '<img src="/wordpress/wp-content/themes/sbc/images/headers/' . $post->ID . '.png" style="margin-left:-5px; margin-right:-5px" />';
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
						else if(file_exists('./wordpress/wp-content/themes/sbc/images/headers/' . $ancestor_id . '.png'))
						{
							echo '<img src="/wordpress/wp-content/themes/sbc/images/headers/' . $ancestor_id . '.png" style="margin-left:-5px; margin-right:-5px" />';
							break;
						}
					}
				}
			}
			
			?>
				<h1><?php the_title(); ?></h1>
				<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>

				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

			</div>
			<?php comments_template(); ?>
		</div>
		
		<?php endwhile; endif; ?>

		<?php if(!in_array($post->ID, $use_wide)){ ?>
		<?php 
		if($_GET['test'] == 1)
		{ 
			include(TEMPLATEPATH . '/right_col_new.php'); 
		}
		else
		{
			include(TEMPLATEPATH . '/right_col.php'); 
		}
		?>
		
		<?php }?>
	</div>
<?php 
if(!in_array($post->ID, $use_wide))
{
	get_sidebar();
}
?>
<?php get_footer(); ?>