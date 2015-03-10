<?php

get_header();

?>
<section class="not-found">
    <div class="row">

        	<h2>This is somewhat embarrassing, isn't it?</h2>
	        <h4>It seems we can't find what you are looking for. Perhaps searching can help.</h4>
	        <div class="medium-6 medium-centered columns" style="margin-top: 50px;">
		        <form data-action="<?php echo get_option('siteurl'); ?>">
			         <i class="fa fa-search"></i><input type="text" name="search" value="" placeholder="Search" style="width:80%; display: inline-block; margin: 0 10px; outline: none; box-shadow: none;" />
		        </form>
	        </div>
    </div>
</section>
<?php

get_footer();