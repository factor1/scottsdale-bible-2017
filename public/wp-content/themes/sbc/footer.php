<?php 
//if ( is_page_template('index_home.php') ) {
if ( is_home() ) {
	// Returns nothing if we are on the home.
} else {
// close out some page divs.
	echo '</div><!-- close page1 div --></div></div><!-- final close wrap -->';}
	
?>

<footer>


<div class="row">
<div class="small-3 columns borderright">
	<h1>This weekend</h1>
	<div class="thisweek">
	<p>Message Title: <span><?php echo of_get_option('footer_nextweek'); ?></span></p>
	<?php
 
				if(of_get_option('footer_nextweekscripture'))
				{
					echo '<p>Scripture: <span>' . of_get_option('footer_nextweekscripture') . '</span></p>';
					}
 
					?>
	<p>Speaker: <span><?php echo of_get_option('footer_nextweekspeaker'); ?></span></p>
	</div>
	

	<form class="subscribeform" action="http://scottsdalebible.us1.list-manage.com/subscribe/post?u=621f3dcab3b5d368b54832b84&amp;id=0de80d194a" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" target="_blank">
	
	<img src="<?php bloginfo('template_url'); ?>/images/weekly-enews.png" alt="weekly-enews" />
	<label>Email Address</label>
	<input type="email" id="mce-EMAIL" name="EMAIL">
	
	<label>First Name</label>
	<input type="text"name="FNAME" id="mce-FNAME">
	
	<label>Last Name</label>
	<input type="text" name="LNAME" id="mce-LNAME">
	<div style="position: absolute; left: -5000px;"><input type="text" name="b_621f3dcab3b5d368b54832b84_0de80d194a" value=""></div>
	
	<input type="submit" class="button tiny" value="subscribe" id="mc-embedded-subscribe">
	</form>
	
	<div class="contactus">
	<h3>Contact us <i class="fa fa-circle-arrow-right"></i></h3>
	<p class="addy">7601 E. Shea Boulevard<br>Scottsdale, AZ 85260</p>
	<p class="phone">480.824.7200</p>
	<p class="compy">feedback@scottsdalebible.com</p>
	</div>
	
	<div class="sociallinks">
	<h3>Follow us <i class="fa fa-circle-arrow-right"></i></h3>
	<a href="https://www.facebook.com/scottsdalebible" target="_blank"><i class="fa fa-facebook"></i></a>
	<a href="https://twitter.com/scottsdalebible" target="_blank"><i class="fa fa-twitter"></i></a>
	<a href="http://instagram.com/scottsdalebible" target="_blank"><i class="fa fa-instagram"></i></a>
	
	<a href="http://www.flickr.com/photos/scottsdalebible" target="_blank"><i class="fa fa-flickr"></i></a>
	<a href="http://scottsdalebible.com/message"><i class="fa fa-microphone"></i></a>
	<a href="http://scottsdalebible.com/feed/" target="_blank"><i class="fa fa-rss"></i></a>
	
</div>



	
	<div class="copy">
	<img src="<?php bloginfo('template_url'); ?>/images/logo_footer.png" alt="logo_footer" width="185" height="55">
	<p>&copy; <?php date('Y');?> Scottsdale Bible Church | All Rights Reserved</p>
	</div>
	
</div><!-- End small-3 col -->


<div class="small-9 columns locations">
	<h1>Service Times & Locations</h1>
<div class="small-6 columns">

	<div class="row">
		<a href="http://scottsdalebible.com/location">
		<img src="<?php bloginfo('template_url'); ?>/images/DirectionsIcon.png" class="directionsIcon"  />
		</a>
		<h4>Shea Campus</h4>
		<p>7601 East Shea Blvd, Scottsdale, AZ 85260<br></p>
		
		<a href="http://scottsdalebible.com/location">
		<img src="<?php bloginfo('template_url'); ?>/images/Shea-Campus-Map.png"  />
		</a><br><br>
		
		<div class="campusinfo">
			<img src="<?php bloginfo('template_url'); ?>/images/campus_main.png" alt="campus_main" class="campussnapshot"/>
			
			<h5>Worship Center</h5>
			<p><span>Pastor:</span> Jamie Rasmussen</p>
			<a href="http://scottsdalebible.com/location/shea-campus-map/" class="campusmapbutton">Campus Map</a>
			
			
			<dl class="campustimes clearfix">
				<dt class="label">Saturdays</dt>
				<dd>5pm</dd>
				<dt class="label">Sundays</dt>
				<dd>9 & 10:45am</dd>
			</dl>
		</div><!-- end campus info -->
		
		
		<div class="campusinfo">
			<img src="<?php bloginfo('template_url'); ?>/images/campus_venue.png" alt="campus_venue" class="campussnapshot"/>
			
			<h5>Venue Community</h5>
			<p><span>Pastor:</span> Rustin Rossello</p>
			<a href="http://scottsdalebible.com/location/shea-campus-map/" class="campusmapbutton">Campus Map</a>
			
			
			<dl class="campustimes clearfix">
				<dt class="label">Sundays</dt>
				<dd>9 & 10:45am</dd>
			</dl>
		</div><!-- end campus info -->
		
		
		<div class="campusinfo">
		<a href="https://scottsdalebible.com/worship-and-creative-arts/gracechapel">
			<img src="<?php bloginfo('template_url'); ?>/images/campus_chapel.png" alt="campus_venue" class="campussnapshot"/>
		</a>
			
			<h5>Grace Chapel</h5>
			<p><span>Pastor:</span> Steve Eriksson</p>
			<a href="http://scottsdalebible.com/location/shea-campus-map" class="campusmapbutton">Campus Map</a>
			
			
			<dl class="campustimes clearfix">
				<dt class="label">Sundays</dt>
				<dd>9 & 10:45am</dd>
			</dl>
		</div><!-- end campus info -->
		

	</div>
	
	
	<div class="row">
	
		<a href="http://scottsdalebible.com/mountainvalley/location/">
		<img src="<?php bloginfo('template_url'); ?>/images/DirectionsIcon.png" class="directionsIcon"  /></a>
		<h4>MOUNTAIN VALLEY CAMPUS</h4>
		<p>17800 N Perimeter Dr, Scottsdale, Arizona 85255<br></p>
			<a href="http://scottsdalebible.com/mountainvalley/location/">
		<img src="<?php bloginfo('template_url'); ?>/images/Campus-Map_MV.png"  />
			</a >
		

		<div class="campusinfo">
		<img src="<?php bloginfo('template_url'); ?>/images/mv.jpg" alt="" class="campussnapshot" />
			
			<h5>MOUNTAIN VALLEY CAMPUS</h5>
			<p><span>Pastor:</span> Neil Montgomery</p>
			<a href="http://scottsdalebible.com/mountainvalley/location/" class="campusmapbutton">Campus Map</a>
			
			
			<dl class="campustimes clearfix">
				<dt class="label">Sundays</dt>
				<dd>10am</dd>
			</dl>
		</div>
	</div>

	

	
</div><!-- End small-4 col -->

<div class="small-6 columns locations">

<div class="row">
		<a href="http://scottsdalebible.com/cactus/location/">
		<img src="<?php bloginfo('template_url'); ?>/images/DirectionsIcon.png" class="directionsIcon"  />
		</a>
		<h4>Cactus Campus</h4>
		<p>2501 East Cactus Rd. Phoenix, AZ 85032<br></p>
		
		<a href="http://scottsdalebible.com/cactus/location/">
		<img src="<?php bloginfo('template_url'); ?>/images/Cactus-Campus-MAP.png"/><br><br>
		</a>
		
		<div class="campusinfo">
			<img src="<?php bloginfo('template_url'); ?>/images/campus_multi.png"class="campussnapshot"  alt="campus_multi"/>
			
			<h5>Cactus Campus</h5>
			<p><span>Pastor:</span> Rick Holman</p>
			<a href="http://scottsdalebible.com/cactus/location/cactus-campus-map/" class="campusmapbutton">Campus Map</a>
			
			
			<dl class="campustimes clearfix">
				<dt class="label">Sundays</dt>
				<dd>9 & 10:45am</dd>
			</dl>
		</div><!-- end campus info -->
	</div>
	
		<div class="row">
		<a href="http://scottsdalebible.com/haydencenter/haydenlocation/">
		<img src="<?php bloginfo('template_url'); ?>/images/DirectionsIcon.png" class="directionsIcon"  />
		</a>
		<h4>Hayden Chapel</h4>
		<p>7901 East Shea Blvd, Scottsdale, AZ 85260<br></p>
		<a href="http://scottsdalebible.com/haydencenter/hayden-campus-map/">
		<img src="<?php bloginfo('template_url'); ?>/images/Life-Campus-MAP.png" /><br><br>
		</a>
		
		<div class="campusinfo">
			<a href="http://scottsdalebible.com/haydencenter/haydenlocation/">
			<img src="<?php bloginfo('template_url'); ?>/images/campus_life.png" alt="campus_life" class="campussnapshot" />
			</a>
			
			<h5>Hayden Chapel</h5>
			<a href="http://scottsdalebible.com/haydencenter/hayden-campus-map/" class="campusmapbutton">Campus Map</a>
			
			
			<p class="campustimes clearfix">
				<a href="http://scottsdalebible.com/hayden/ ">Click here for more information</a>
			</p>
		</div><!-- end campus info -->

	</div>
	
	
	

		

</div>

</div><!-- end the small-9 col -->



</div>
</footer>












		

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
<script type='text/javascript'>
    var _sf_async_config={};
    /** CONFIGURATION START **/
    _sf_async_config.uid = 2293;
    _sf_async_config.domain = 'scottsdalebible.com';
    _sf_async_config.useCanonical = true;
        /** CONFIGURATION END **/
    (function(){
      function loadChartbeat() {
        window._sf_endpt=(new Date()).getTime();
        var e = document.createElement('script');
        e.setAttribute('language', 'javascript');
        e.setAttribute('type', 'text/javascript');
        e.setAttribute('src', '//static.chartbeat.com/js/chartbeat.js');
        document.body.appendChild(e);
      }
      var oldonload = window.onload;
      window.onload = (typeof window.onload != 'function') ?
         loadChartbeat : function() { oldonload(); loadChartbeat(); };
    })();
</script>
<!-- End Chartbeat -->



<script src="<?php bloginfo('template_url'); ?>/js/rem.js" type="text/javascript"></script>


<!-- Start of StatCounter Code for Default Guide -->
<script type="text/javascript">
var sc_project=9650106; 
var sc_invisible=1; 
var sc_security="c4e0688c"; 
var scJsHost = (("https:" == document.location.protocol) ?
"https://secure." : "http://www.");
document.write("<sc"+"ript type='text/javascript' src='" +
scJsHost+
"statcounter.com/counter/counter.js'></"+"script>");
</script>
<noscript><div class="statcounter"><a title="web analytics"
href="http://statcounter.com/" target="_blank"><img
class="statcounter"
src="http://c.statcounter.com/9650106/0/c4e0688c/1/"
alt="web analytics"></a></div></noscript>
<!-- End of StatCounter Code for Default Guide -->


<?php wp_footer(); ?>
</body>
</html>