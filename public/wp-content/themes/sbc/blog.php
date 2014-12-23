<?php
/*
Template Name: Blog
*/
?>
<?php get_header(); ?>
	<div id="content" class="sermoncolumn">
	<div class="sermon">
		<?php if (have_posts()) : ?>

 	  <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
	  <?php
		if(!is_tag())
		{
			$cat_title = '<h1 class="pagetitle">Scottsdale Bible Church Blog</h1>';
		}
		echo $cat_title;
		
		?>
		<div style="clear: both;"></div>
		<table width="100%">
			<tbody>
		<?php
	 global $post;
	 $myposts = get_posts('numberposts=10');
	 
	 foreach($myposts as $post) :
	 setup_postdata($post);
	 $metapassage = get_post_meta($post->ID, 'passage', 'true');
	 list($date, $time) = explode(' ', $post->post_date);
		list($year, $month, $day) = explode('-', $date);
		list($hour, $minute, $second) = explode(':', $time);

		$timestamp = mktime($hour, $minute, $second, $month, $day, $year);
	 if($row_class == 'evenrow')
	{
		$row_class = 'oddrow';
	}
	else
	{
		$row_class = 'evenrow';
	}

	 ?>
	 <tr class="<?php echo $row_class; ?>"><td><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>" style="font-weight: bold; font-size: 14px;"><?php the_title(); ?></a><br />Posted <?php echo date('F j, Y', $timestamp); ?><br /><?php the_tags(); ?><br /><?php the_content('Read the full post »'); ?></td></tr>
	 <?php endforeach; ?>
			</tbody>
		</table>

		<div>
			<?php next_posts_link('&laquo; Older Entries') ?><?php previous_posts_link(' | Newer Entries &raquo;') ?>
		</div>

	<?php else : ?>

		<h2 class="center">Not Found</h2>
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>

	<?php endif; ?>

	</div>
	<?php include(TEMPLATEPATH . '/right_col.php'); ?>

</div>
<?php //get_sidebar(); ?>

<?php get_footer(); ?>
