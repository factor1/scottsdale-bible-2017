

<article class="groupdetail row">
	<div class="medium-8 columns">
	
	<section class="groupheader">
	<h1 class="grouptitle" id="groupName"></h1>
	<p>Campus: <span id="groupCampus"></span></p>
	</section>
	
	<div class="row lineitem">
	<div class="medium-3 columns itemlabel">Description</div>
	<div class="medium-9 columns" id="groupDescription">
		 
	</div>
	</div>
	
	<div class="row lineitem">
	<div class="medium-3 columns itemlabel">Group Leader</div>
	<div class="medium-3 columns" id="LeaderPhoto">
		
	</div>
	
	<div class="medium-6 columns">
		<strong><span id="LeaderName"></span></strong><br>		
	</div>
	</div>
	
	<div class="row lineitem">
	<div class="medium-3 columns itemlabel">Life Stage</div>
	<div class="medium-9 columns" id="groupLifeStage"></div>
	</div>
	
	<div class="row lineitem">
	<div class="medium-3 columns itemlabel">Child Friendly</div>
	<div class="medium-9 columns" id="kidsWelcome"></div>
	</div>
	
	<div class="row lineitem">
	<div class="medium-3 columns itemlabel">Meets on</div>
	<div class="medium-9 columns"><span id="groupMeetingDay"></span></div>
	</div>
	
	<div class="row lineitem">
	<div class="medium-3 columns itemlabel">Location</div>
	<div class="medium-9 columns">
		<span id="Address"></span><br><span id="City"></span>, <span id="State"></span><br>	
		<div id="map" style="width: 100%; height: 300px;"></div>
		</div>
	</div>
	
	
	
	
	
	
	</div>
	<div class="medium-3 columns sidebar panel" id="contactForm">
	
		<h2>Contact this group?</h2>
		<form class="groupintrest" id="commentForm" method="get" action="">
		<label>Your Name</label>
		<input type="text" placeholder="First & Last" id="Name" name="Name" required minlength="2">
		
		<label>Email Address</label>
		<input type="text" placeholder="you@your.com" id="Email" name="Email" required email>
		
		<label>Phone Number</label>
		<input type="text" placeholder="Including Area Code" id="Phone" name="Phone" required minlenght="10" >
		
		<label>Message</label>
		<textarea rows="8" cols="8" id="Message" name="Message" required></textarea>
		
		<button type="submit" value="submit" id="Button_SendEmail">Submit</button>
		</form>
	
	</div>




</article>

<script>
var map;

function initialize() {
  var myLatlng = new google.maps.LatLng(33.5,-111.9333);
  var mapOptions = {
    zoom: 8,
    center: myLatlng,
	disableDefaultUI: true
  }
  map = new google.maps.Map(document.getElementById('map'), mapOptions);
}

google.maps.event.addDomListener(window, 'load', initialize);

    </script>


<script type="text/javascript">
	var groupID;
	
	$(document).ready(function() {	
		console.log(getUrlVars()["groupID"]);
		groupID = getUrlVars()["groupID"];
		
		$('#Button_SendEmail').click(function(event) {
			event.preventDefault();
						
			if ($('#commentForm').valid())
			{
				console.log('Valid');
				//Hide the Button while sending email
				$('#Button_SendEmail').hide();
				sendGroupEmail();
			}
			
		});
		
		$('#commentForm').validate();
		
		if (groupID.length > 0)
		{
			//Get Group
        var uri = 'https://my.scottsdalebible.com/mpjsapi/api/groups';		
		
		$.getJSON(uri + '/' + groupID)
        .done(function (data) {
			console.log(data[0]);
			
			$('#groupName').text(data[0].Group_Name);
			$('#groupCampus').text(data[0].Congregation_Name);
			$('#groupDescription').text(data[0].Description);
			
			if (data[0].Kids_Welcome != null && data[0].Kids_Welcome == true)
			{
				$('#kidsWelcome').text("Yes");
			}
			else
			{
				$('#kidsWelcome').text("No");
			}
			
			
			$('#Address').text(data[0].Address_Line_1);
			$('#City').text(data[0].City);
			$('#State').text(data[0].State);
			
			$('#groupMeetingDay').text(data[0].Meeting_Day);
			$('#groupLifeStage').text(data[0].Life_Stage);
			$('#LeaderName').text(data[0].LeaderFirstName + ' ' + data[0].LeaderLastName);
			
			if (data[0].LeaderImage != null)
			{
				$('#LeaderPhoto').append('<img src="' + data[0].LeaderImage + '">');
			}
			
			if (data[0].Longitude != null)
			{
				var myLatlng = new google.maps.LatLng(data[0].Latitude,data[0].Longitude);
				var marker = new google.maps.Marker({
					position: myLatlng,
					map: map,
					title: 'Hello World!'
				});
			}
        });			
		}
	});
	
	function getUrlVars()
	{
		var vars = [], hash;
		var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
		for(var i = 0; i < hashes.length; i++)
		{
			hash = hashes[i].split('=');
			vars.push(hash[0]);
			vars[hash[0]] = hash[1];
		}
		return vars;
	}

	function GetTime(obj)
	{
		var ampm = "AM";
		var hours = obj.getHours();
		var mins = obj.getMinutes();
		var minstr = mins + "";
		
		if (hours > 12)
		{
			hours = hours - 12;
			ampm = "PM";
		}
		
		if (mins < 10)
		{
			minstr = "0" + mins;
		}
		
		return hours + ":" + minstr + " " + ampm;
	}
	
	function sendGroupEmail()
	{
		console.log('sendGroupEmail - Start');
		var Name = $('#Name').val();
		var Email = $('#Email').val();
		var Phone = $('#Phone').val();
		var Message = $('#Message').val();
		
		var uri = "https://my.scottsdalebible.com/mpjsapi/Email/SendEmail";
		var data = { Name: Name, Email: Email, Phone: Phone, Message: Message, GroupID: groupID };
		
        $.ajax({
            type: "GET",
            url: uri,
            data: data,
			crossDomain: true,
            success: function (data, status, jqXHR) {
				if (data == 'success')
				{
					console.log('sendGroupEmail - success');
					$('#contactForm').html('<h2>Email Sent</h2>');
				}
            },
            error: function (xhr) {
                console.log("Error...");
                console.log(xhr.responseText);
				alert('Error occurred while sending email.');
            }
        });
		
		console.log('sendGroupEmail - End');
	}
	
</script>



