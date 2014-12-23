<?php get_header(); ?>
	<div id="content" class="sermoncolumn">
	<div class="sermon">
		<?php if (have_posts()) : ?>
		<h1 class="pagetitle">Scottsdale Bible Teaching</h1>
		<div>				
</div>
<div style="clear: both;"></div>
			<div style="margin-top: 10px;">
			<strong>Series</strong>
	<?php wp_dropdown_categories('name=cat1&show_option_none=Select Series&child_of=5&show_count=1&orderby=name'); ?>

<script type="text/javascript"><!--
    var dropdown1 = document.getElementById("cat1");
    function onCatChange1() {
		if ( dropdown1.options[dropdown1.selectedIndex].value > 0 ) {
			location.href = "<?php echo get_option('home');
?>/?cat="+dropdown1.options[dropdown1.selectedIndex].value;
		}
    }
    dropdown1.onchange = onCatChange1;
--></script>
		<strong>Speaker</strong>
	<?php wp_dropdown_categories('name=cat2&show_option_none=Select Speaker&child_of=32&show_count=1&orderby=name'); ?>

<script type="text/javascript"><!--
    var dropdown2 = document.getElementById("cat2");
    function onCatChange2() {
		if ( dropdown2.options[dropdown2.selectedIndex].value > 0 ) {
			location.href = "<?php echo get_option('home');
?>/?cat="+dropdown2.options[dropdown2.selectedIndex].value;
		}
    }
    dropdown2.onchange = onCatChange2;
--></script>
	<strong>Teaching</strong>
	<?php wp_dropdown_categories('name=teaching&show_option_none=Select Teaching&child_of=100&show_count=1&orderby=name'); ?>

<script type="text/javascript"><!--
    var dropdown4 = document.getElementById("teaching");
    function onCatChange4() {
		if ( dropdown4.options[dropdown4.selectedIndex].value > 0 ) {
			location.href = "<?php echo get_option('home');
?>/?cat="+dropdown4.options[dropdown4.selectedIndex].value;
		}
    }
    dropdown4.onchange = onCatChange4;
--></script>
		</div>
		<table width="100%">
			<tbody>
				<tr>
					<th>
						Date
					</th>
					<th>
						Title
					</th>
					<th>
						Series
					</th>
					<th>
						Speaker
					</th>
					<th>
						Teaching
					</th>
				</tr>
		<?php while (have_posts()) : the_post(); ?>
		<?php
		$sermon_speaker = '';
		$series_title = '';
		$teaching = '';
		foreach((get_the_category()) as $category) 
		{ 
			if($category->category_parent == 32)
			{
				$sermon_speaker =  '<a href="' . get_category_link($category->cat_ID) . '">' . $category->cat_name . '</a>';
			}
			if($category->category_parent == 5 || $category->category_parent == 101)
			{
				$series_title =  '<a href="' . get_category_link($category->cat_ID) . '">' . $category->cat_name . '</a>';
			}
			if($category->category_parent == 100)
			{
				$teaching =  '<a href="' . get_category_link($category->cat_ID) . '">' . $category->cat_name . '</a>';
			}
		}
		?>			
			<?php
				if($row_class == 'evenrow')
				{
					$row_class = 'oddrow';
				}
				else
				{
					$row_class = 'evenrow';
				}
				setup_postdata($post);
				$metapassage = get_post_meta($post->ID, 'passage', 'true');
				
				list($date, $time) = explode(' ', $post->post_date);
				list($year, $month, $day) = explode('-', $date);
				list($hour, $minute, $second) = explode(':', $time);

				$timestamp = mktime($hour, $minute, $second, $month, $day, $year);
				
				
			?>
				<tr class="<?php echo $row_class; ?>"><td><?php echo date('n/j/y', $timestamp); ?></td><td><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></td><td><?php echo $series_title; ?></td><td><?php echo $sermon_speaker; ?></td><td><?php echo $teaching; ?></td></tr>
			<?php endwhile; ?>
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
