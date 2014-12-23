<?php 
//if ( is_page_template('index_home.php') ) {
if ( is_home() ) {
	// Returns nothing if we are on the home.
} else {
// close out some page divs.
	echo '</div><!-- close page1 div --></div></div><!-- final close wrap -->';}
	
?>



<div class="footerwrap">
	<div id="section5" class="container_padding">
		<div id="column1">
			<h2 class="font-blue">Weekend Worship</h2>
			<p>MESSAGE TITLE: <span class="font-blue"><?php echo of_get_option('footer_nextweek'); ?><span></p>
			
				<?php
 
				if(of_get_option('footer_nextweekscripture'))
				{
					echo '<p>SCRIPTURE: <span class="font-blue">' . of_get_option('footer_nextweekscripture') . '</span></p>';
					}
 
					?>
			
			<p>SPEAKER: <span class="font-blue"><?php echo of_get_option('footer_nextweekspeaker'); ?></span></p>
			<span class="subtitle">THIS WEEKEND</span>
			<p class="font-blue">SATURDAY: 5PM</p>
			<p class="font-blue">SUNDAY: 8, 9:30 & 11:15AM</p>
			<span class="subtitle">THE VENUE <span class="venue"></span></span>
			<p class="font-blue">SUNDAY: 9:30 & 11:15AM</p> 
			<span class="subtitle">CACTUS CAMPUS <span class="venue"></span></span>
			<p class="font-blue">2501 E CACTUS RD, PHOENIX</p> 
			<p class="font-blue">SUNDAY: 9:30 & 11:15AM</p> 
			<p class="copyright">&#169; <?php echo date("Y"); ?> Scottsdale Bible | All Rights Reserved</p>
		</div>
		<div id="column2">
			<h2 class="font-blue">Contact us</h2>
			<p>
				7601 E SHEA BOULEVARD,
			</p>
			<p>
				<span class="address">SCOTTSDALE, AZ 85260 <span class="font-blue"><a href="/location">(MAP)</a></span></span>
			</p>
			<p class="font-blue" style="margin-top:10px">PHONE: <span class="font-white">480.824.7200</span></p>
			<p class="font-blue">EMAIL: <span class="font-white">FEEDBACK@SCOTTSDALEBIBLE.COM</span></p>
			<p class="font-blue">FAX: <span class="font-white">480.707.0499</span></p>
		</div>
		<div id="column3">
			<p class="social">FOLLOW US: 
				<a href="http://facebook.com/scottsdalebible"><img src="<?php bloginfo('template_url'); ?>/images/facebook.png" /></a>
				<a href="http://twitter.com/scottsdalebible"><img src="<?php bloginfo('template_url'); ?>/images/twitter.png" /></a>
				<a href="http://www.flickr.com/photos/scottsdalebible/collections/"><img src="<?php bloginfo('template_url'); ?>/images/flickr.png" /></a>
				<a href="https://itunes.apple.com/us/podcast/scottsdale-bible-church-sermon/id673774280?mt=2&ign-mpt=uo%3D4"><img src="<?php bloginfo('template_url'); ?>/images/itunes.png" /></a>
				<a href="http://scottsdalebible.com/follow"><img src="<?php bloginfo('template_url'); ?>/images/feeds.png" /></a>
			</p>
			<div class="fb-like-box" style="background:#fff; float:right;" data-href="http://www.facebook.com/scottsdalebible" data-width="292" data-show-faces="true" data-stream="false" data-header="true"></div>
		</div>
	</div><!--section5-->

</div> <!-- close out the footerwrap div -->



		<?php wp_footer(); ?>

<!-- Start Quantcast tag -->
<script type="text/javascript">
_qoptions={
qacct:"p-aalJ8sFCvGENQ"
};
</script>
<?php
if($_SERVER["HTTPS"])
{
	echo '<script type="text/javascript" src="https://edge.quantserve.com/quant.js"></script>';
}
else
{
	echo '<script type="text/javascript" src="http://edge.quantserve.com/quant.js"></script>';
}
 ?>
<noscript>
<?php
if($_SERVER["HTTPS"])
{
	echo '<img src="https://pixel.quantserve.com/pixel/p-aalJ8sFCvGENQ.gif" style="display: none;" border="0" height="1" width="1" alt="Quantcast"/>';
}
else
{
	echo '<img src="http://pixel.quantserve.com/pixel/p-aalJ8sFCvGENQ.gif" style="display: none;" border="0" height="1" width="1" alt="Quantcast"/>';
}
 ?>

</noscript>
<!-- End Quantcast tag -->
<!-- Start Google Analytics -->
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-2243545-1");
pageTracker._trackPageview();
} catch(err) {}</script>
<!-- End Google Analytics -->
<!-- Start Chartbeat -->
<script type="text/javascript">
var _sf_async_config={uid:2293,domain:"scottsdalebible.com"};
(function(){
  function loadChartbeat() {
    window._sf_endpt=(new Date()).getTime();
    var e = document.createElement('script');
    e.setAttribute('language', 'javascript');
    e.setAttribute('type', 'text/javascript');
    e.setAttribute('src',
       (("https:" == document.location.protocol) ? "https://s3.amazonaws.com/" : "http://") +
       "static.chartbeat.com/js/chartbeat.js");
    document.body.appendChild(e);
  }
  var oldonload = window.onload;
  window.onload = (typeof window.onload != 'function') ?
     loadChartbeat : function() { oldonload(); loadChartbeat(); };
})();
</script>
<!-- End Chartbeat -->
</body>
</html>