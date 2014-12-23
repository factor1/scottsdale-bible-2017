<div id="footer">
<!-- If you'd like to support WordPress, having the "powered by" link somewhere on your blog is the best way; it's our only promotion or advertising. -->
	<p>
	&copy; <?php echo date("Y"); ?> Scottsdale Bible Church | All Rights Reserved | 7601 East Shea Boulevard | Scottsdale, AZ 85260 | 480.824.7200<span class="intranet_links" style="display: none;"> | <a href="http://www.sbcsupport.org/cgi-bin/wonderdesk/wonderdesk.cgi">Track-IT</a> | <a href="http://sql/VirtualEms/BrowseEvents.aspx">EMS</a> | <a href="https://portal.adp.com">ADP</a>
		<!-- <?php echo get_num_queries(); ?> queries. <?php timer_stop(1); ?> seconds. -->
	</p>
</div>
<hr />
</div><!-- close page1 div -->

</div>
		<?php wp_footer(); ?>
		<?php
			if($_SERVER["HTTPS"] != "on")
			{
				echo '
		<!-- RefTagger from Logos. Visit http://www.logos.com/reftagger. This code should appear directly before the </body> tag. -->
<script src="https://bible.logos.com/jsapi/referencetagging.js" type="text/javascript"></script>
<script type="text/javascript">
    Logos.ReferenceTagging.lbsBibleVersion = "ESV";
    Logos.ReferenceTagging.lbsLinksOpenNewWindow = true;
	Logos.ReferenceTagging.lbsCssOverride = true; 
    Logos.ReferenceTagging.lbsLibronixLinkIcon = "dark";
    Logos.ReferenceTagging.lbsNoSearchTagNames = [ "h1", "h2" ];
    Logos.ReferenceTagging.tag();
</script>';
			}
			?>
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