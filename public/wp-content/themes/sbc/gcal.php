<?php
//v0.91: Nice error message if there are no events to display, requested by Tomas. Thanks!
//v0.90: Feature: clickable links in descriptions (start them http://). Thank you, Adam!
//       Feature: display end times, requested by Lucy. Thanks!
//       Feature: group by date, requested by Lucy. Thanks!
//       Note: I now use PHP5 - while this code should continue working in PHP4, beware!
//       http://james.cridland.net/code


/////////
//Configuration
//

// The 'Calendar ID' code (as shown in your 'calendar settings' page)
if (!isset($gmail)) {$gmail = $gcal_address; }

// Date format you want your details to appear
$dateformat="F j"; // 10 March 2009 - see http://www.php.net/date for details
$timeformat="g:i a"; // 12.15am

//Time offset - if times are appearing too early or too late on your website, change this.
$offset="-7 hours"; // you can use "+1 hour" here for example

// How you want each thing to display.
// By default, this contains all the bits you can grab. You can put ###DATE### in here too if
// you want to, and disable the 'group by date' below.
$event_display="<P><B>###TITLE###</b> - from ###FROM### until ###UNTIL### (<a href='###LINK###'>add this</a>)<BR>###WHERE### (<a href='###MAPLINK###'>map</a>)<br>###DESCRIPTION###</p>";

// What happens if there's nothing to display
$event_error="<P>There are no events to display.</p>";

// The separate date header is here
$event_dateheader="<P><B>###DATE###</b></P>";
$GroupByDate=true;
// Change the above to 'false' if you don't want to group this by dates,
// but remember to add ###DATE### in the event_display if you do.

// ...and how many you want to display (leave at 999 for everything)
$items_to_show=25;

//Where your simplepie.inc is (mine's in the root for some reason)
require_once($_SERVER['DOCUMENT_ROOT'].'/simplepie/simplepie.inc');

// Cache location for your XML file
$cache_location=$_SERVER['DOCUMENT_ROOT'].'/calcache';

// Change this to 'true' to see lots of fancy debug code
$debug_mode=false;

//
//End of configuration block
/////////

if ($debug_mode) {error_reporting (E_ALL); echo "<P>Debug mode is on.</p>";}

// Make sure that correct version of SimplePie is loaded
if (SIMPLEPIE_VERSION<1) { echo "<P><B>Fatal error</b><BR>You need to be running SimplePie v1.0 or above for this to work.</p>"; die; }

// Form the XML address.
$calendar_xml_address = "http://www.google.com/calendar/feeds/".$gmail."/public/full?singleevents=true&max-results=200&orderby=starttime&sortorder=a&futureevents=true&";

// If you only want a section of dates - today only, for example, then try the following, which sets a maximum date to return. I've set this for a day from now.
// $calendar_xml_address = "http://www.google.com/calendar/feeds/".$gmail."/public/full?singleevents=true&start-min=".date("Y-m-d")."&start-max=".date("Y-m-d",strtotime("+1 day"));

// Set the offset correctly
$offset=(strtotime("now")-strtotime($offset));
if ($debug_mode) {echo "Offset is ".$offset;}

// Let's create a new SimplePie object
$feed = new SimplePie();

// Set the cache location
$feed->set_cache_location($cache_location);
$feed->enable_cache(false); 
if ($debug_mode) {
$feed->enable_cache(false);
echo "<P>We're going to go and grab <a href='$calendar_xml_address'>this feed</a>.<P>";}

// This is the feed we'll use
$feed->set_feed_url($calendar_xml_address);
 
// Let's turn this off because we're just going to re-sort anyways, and there's no reason to waste CPU doing it twice.
$feed->enable_order_by_date(false);
 
// Initialize the feed so that we can use it.
$feed->init();
 
// Make sure the content is being served out to the browser properly.
$feed->handle_content_type();
 
// We'll use this for re-sorting the items based on the new date.
$temp = array();
 
foreach ($feed->get_items() as $item) {
 
    // We want to grab the Google-namespaced <gd:when> tag.
    $when = $item->get_item_tags('http://schemas.google.com/g/2005', 'when');
 
    // Now, let's grab the Google-namespaced <gd:where> tag.
    $gd_where = $item->get_item_tags('http://schemas.google.com/g/2005', 'where');
    $location = $gd_where[0]['attribs']['']['valueString'];
    //and the status tag too, come to that
    $gd_status = $item->get_item_tags('http://schemas.google.com/g/2005', 'eventStatus');
    $status = substr( $gd_status[0]['attribs']['']['value'], -8);
 
    $when = $item->get_item_tags('http://schemas.google.com/g/2005', 'when');
    $startdate = $when[0]['attribs']['']['startTime']; 
    $enddate = $when[0]['attribs']['']['endTime']; 
    $unixstartdate = SimplePie_Misc::parse_date($startdate);
        $unixenddate = SimplePie_Misc::parse_date($enddate);
    $where = $item->get_item_tags('http://schemas.google.com/g/2005', 'where'); 
    $location = $where[0]['attribs']['']['valueString']; 

    // If there's actually a title here (private events don't have titles) and it's not cancelled...
if (strlen(trim($item->get_title()))>1 && $status != "canceled" && strlen(trim($startdate)) > 0) {
        $temp[] = array('startdate'=>$unixstartdate, 'enddate'=>$unixenddate, 'where'=>$location, 'title'=>$item->get_title(), 'description'=>$item->get_description(), 'link'=>$item->get_link());
        if ($debug) { echo "Added ".$item->get_title();}
    } 

}

//Sort this 
sort($temp);

if ($debug) {print_r($temp);}

$items_shown=0; 
$items_shown_page = 0;
$old_date="";
// Loop through the (now sorted) array, and display what we wanted.
echo '<ul id="cal_list">';
foreach ($temp as $item) {
    // These are the dates we'll display
    $gCalStartDate = gmdate($dateformat, $item['startdate']-$offset);
	$gCalStartDay = gmdate('j', $item['startdate']-$offset);
	$gCalStartMonth = gmdate('F', $item['startdate']-$offset);
    $gCalStartTime = gmdate($timeformat, $item['startdate']-$offset);
	$gCalStartTime = str_replace(':00', '', $gCalStartTime);
	$gCalStartTime = str_replace('pm', 'p.m.', $gCalStartTime);
	$gCalStartTime = str_replace('am', 'a.m.', $gCalStartTime);
	$gCalEndDate = gmdate($dateformat, $item['enddate']-$offset);
	$gCalEndMonth = gmdate('F', $item['enddate']-$offset);
	$gCalEndDay = gmdate('j', $item['enddate']-$offset);
    $gCalEndTime = gmdate($timeformat, $item['enddate']-$offset);
	$gCalEndTime = str_replace(':00', '', $gCalEndTime);
	$gCalEndTime = str_replace('pm', 'p.m.', $gCalEndTime);
	$gCalEndTime = str_replace('am', 'a.m.', $gCalEndTime);
	
	//echo '<!-- dates ' . $gCalStartDate . $gCalStartTime . $gCalEndTime . ' -->';
	
	if($gCalStartTime == $gCalEndTime)
	{
	}
	
	if($gCalStartMonth == $gCalEndMonth)
	{
		$display_date = $gCalStartDate;
		if($gCalStartDay != $gCalEndDay)
		{
			$display_date = $display_date . '–' . $gCalEndDay;
		}
	}
	else
	{
		$display_date = $gCalStartDate . '–' . $gCalEndMonth . ' ' . $gCalEndDay;
	}
	
	$location = trim(substr($item['where'], strpos($item['where'], '(')), '() ');
	if($location)
	{
		$location = ', ' . $location . ' (<a target="_blank" href="http://maps.google.com/?q=' . urlencode($item['where']) . '">map</a>)';
	}
	
	//Make any URLs used in the description also clickable: thanks Adam
    $item['description'] = eregi_replace('(((f|ht){1}tp://)[-a-zA-Z0-9@:%_\+.~#?,&//=]+)','<a href="\\1">\\1</a>', $item['description']);
       // Make email addresses clickable: thanks, Bjorn
       $item['description'] = eregi_replace('([_.0-9a-z-]+@([0-9a-z][0-9a-z-]+\.)+[a-z]{2,3})','<ahref="mailto:\\1">\\1</a>', $item['description']);
	
	$item['description'] = nl2br($item['description']);
    // Now, let's run it through some str_replaces, and store it with the date for easy sorting later
    $temp_event=$event_display;
    $temp_dateheader=$event_dateheader;
    $temp_event=str_replace("###TITLE###",$item['title'],$temp_event);
    $temp_event=str_replace("###DESCRIPTION###",$item['description'],$temp_event);
    $temp_event=str_replace("###DATE###",$gCalStartDate,$temp_event);
    $temp_dateheader=str_replace("###DATE###",$gCalStartDate,$temp_dateheader);
    $temp_event=str_replace("###FROM###",$gCalStartTime,$temp_event);
    $temp_event=str_replace("###UNTIL###",$gCalEndTime,$temp_event);
    $temp_event=str_replace("###WHERE###",$item['where'],$temp_event);
    $temp_event=str_replace("###LINK###",$item['link'],$temp_event);
    $temp_event=str_replace("###MAPLINK###","http://maps.google.com/?q=".urlencode($item['where']),$temp_event);
    // Accept and translate HTML
    $temp_event=str_replace("&lt;","<",$temp_event);
    $temp_event=str_replace("&gt;",">",$temp_event);
    $temp_event=str_replace("&quot;","\"",$temp_event);
	
    if (($items_to_show>0 AND $items_shown<$items_to_show)) {
		if($items_shown % 5 == 0)
		{
			if($items_shown == 0)
			{
				$hide_me = ' class="cal_events cal_events_' . $items_shown_page . '"';
				//echo '<div id="cal_events_' . $items_shown_page . '" class="cal_events">';
			}
			else
			{
				$hide_me = ' class="cal_events hidden cal_events_' . $items_shown_page . '"';
				//echo '<div id="cal_events_' . $items_shown_page . '" class="hidden cal_events">';
			}
			$items_shown_page++;
		}
	   echo '<li' . $hide_me . '><a class="event_click' . ($items_shown + 1) . '" href="javascript: void(0);" onClick="calToggle(\'event_box' . ($items_shown + 1) . '\')">' . $item['title'] . '</a><br />' . 
	   $display_date . '<br />' . 
	   $gCalStartTime . '–' . $gCalEndTime . $location;
		echo '<div id="event_box' . ($items_shown + 1) . '" class="hidden event_box">' . $item['description'] . ' <a class="event_click' . ($items_shown + 1) . '" href="javascript: void(0);" onClick="calToggle(\'event_box' . ($items_shown + 1) . '\')">(close)</a></div>';
		echo '</li>';
        $items_shown++;
		$count = $count + 1;
		
		if($items_shown % 5 == 0)
		{
			//echo '</div>';
		}
		
    }
}
//this line does not execute
//echo '22';
echo '</ul>';
if($items_shown_page > 1)
{
	echo '<div id="cal_nav">';
	for($i=0; $i< $items_shown_page; $i++)
	{
		if($i != 0){ echo ' | ';}
		$display_text = $i+1;
		if($i == 0){$display_text = 'First';}
		
		if($i == $items_shown_page-1){$display_text = 'Last';}
		
		echo '<a href="#" class="cal_link" onClick="calBoxToggle(\'cal_events_' . $i . '\');">' . $display_text . '</a>';
	}
	echo '</div>';
}


//Nothing displayed. Oh dear.
if ($items_shown==0) { echo $event_error; }

if ($debug_mode) { echo "<PRE>";
echo wordwrap(highlight_string(file_get_contents($calendar_xml_address),true),80);
echo "</pre>"; }

?>