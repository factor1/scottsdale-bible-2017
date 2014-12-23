<style>

	.groundbreaking {
			background: #fff url(<?php bloginfo('template_url'); ?>/images/GroundBreaking.jpg) center no-repeat;
			height: 355px;
			width: 640px;
			padding: 10px;
			display: block;
			box-shadow: 0 0 10px #333;
			margin: 15px 0;
			position: relative;
	
	}
	
	.timer {
		position: absolute;
		bottom: 20px;
		left: 150px;
		color: #fff;
		font-size: 1em;
	}
	
	.timer .digit {
		float: left;
		margin-right: 20px; 
		text-align: center;
		text-shadow: 1px 2px 3px #333;}
		
	.timer .digit h1 {
		font-size: 45px; 
		text-align: center
		}
		
	.timer .digit .label {
		font-size: 22px; 
		text-align: center;
		}
	
		
	</style>
	
	
<div class="groundbreaking">
	<div class="timer">
<script language="JavaScript">
TargetDate = "10/13/2013 5:00 PM";
BackColor = "";
ForeColor = "";
CountActive = true;
CountStepper = -1;
LeadingZero = true;
DisplayFormat = "<div class='digit'><h1>%%D%%</h1><span class='label'>Days</span></div><div class='digit'><h1>%%H%%</h1><span class='label'>Hours</span></div><div class='digit'><h1>%%M%%</h1><span class='label'>Minutes</span></div><div class='digit'><h1>%%S%%</h1><span class='label'>Seconds</span></div> ";
FinishMessage = "";
</script>
<script language="JavaScript" src="http://scripts.hashemian.com/js/countdown.js"></script>
</div>
</div>