$(document).ready(function(){
$.get("/pp/remote_addr.php", function(data){if(data == '64.130.251.206'){$('.intranet_links').show();}});
	
//begin one faith
$('#li-67-7').hide();
$("#other").val(" ");
$("#church").change(function(){
message_index = $("#church").val();
if (message_index == 'Other')
{
	$("#other").val("");
	$('#li-67-7').show();
}
if (message_index != 'Other')
{
	$("#other").val(" ");
	$('#li-67-7').hide();
}
});
//end one faith

//begin vbx
$("#cforms43form > .cf-fs3").hide();
$("#cforms43form > .cf-fs4").hide();
$("#cforms43form > .cf-fs5").hide();
$("#cforms43form > .cf-fs6").hide();

$("#cforms43form > .cf-fs3 input").val(" ");
$("#child_2_birth_date option:eq(1)").attr("selected","selected");
$("#child_2_birth_month option:eq(1)").attr("selected","selected");
$("#child_2_birth_year option:eq(1)").attr("selected","selected");
$("#child_2_gender option:eq(1)").attr("selected","selected");
$("#child_2_grade_entering option:eq(1)").attr("selected","selected");
$("#child_2_guardian_email").val("example@example.com");
$("#child_2_photo option:eq(1)").attr("selected","selected");
$("#child_2_medical option:eq(1)").attr("selected","selected");

$("#cforms43form > .cf-fs4 input").val(" ");
$("#child_3_birth_date option:eq(1)").attr("selected","selected");
$("#child_3_birth_month option:eq(1)").attr("selected","selected");
$("#child_3_birth_year option:eq(1)").attr("selected","selected");
$("#child_3_gender option:eq(1)").attr("selected","selected");
$("#child_3_grade_entering option:eq(1)").attr("selected","selected");
$("#child_3_guardian_email").val("example@example.com");
$("#child_3_photo option:eq(1)").attr("selected","selected");
$("#child_3_medical option:eq(1)").attr("selected","selected");

$("#cforms43form > .cf-fs5 input").val(" ");
$("#child_4_birth_date option:eq(1)").attr("selected","selected");
$("#child_4_birth_month option:eq(1)").attr("selected","selected");
$("#child_4_birth_year option:eq(1)").attr("selected","selected");
$("#child_4_gender option:eq(1)").attr("selected","selected");
$("#child_4_grade_entering option:eq(1)").attr("selected","selected");
$("#child_4_guardian_email").val("example@example.com");
$("#child_4_photo option:eq(1)").attr("selected","selected");
$("#child_4_medical option:eq(1)").attr("selected","selected");

$("#cforms43form > .cf-fs6 input").val(" ");
$("#child_5_birth_date option:eq(1)").attr("selected","selected");
$("#child_5_birth_month option:eq(1)").attr("selected","selected");
$("#child_5_birth_year option:eq(1)").attr("selected","selected");
$("#child_5_gender option:eq(1)").attr("selected","selected");
$("#child_5_grade_entering option:eq(1)").attr("selected","selected");
$("#child_5_guardian_email").val("example@example.com");
$("#child_5_photo option:eq(1)").attr("selected","selected");
$("#child_5_medical option:eq(1)").attr("selected","selected");


$("#Number-of-children").change(function() 
    {
        message_index = $("#Number-of-children").val();

        if (message_index == 1)
        {
			$("#cforms43form > .cf-fs3").hide();
			$("#cforms43form > .cf-fs4").hide();
			$("#cforms43form > .cf-fs5").hide();
			$("#cforms43form > .cf-fs6").hide();

			$("#cforms43form > .cf-fs3 input").val(" ");
			$("#child_2_birth_date option:eq(1)").attr("selected","selected");
			$("#child_2_birth_month option:eq(1)").attr("selected","selected");
			$("#child_2_birth_year option:eq(1)").attr("selected","selected");
			$("#child_2_gender option:eq(1)").attr("selected","selected");
			$("#child_2_grade_entering option:eq(1)").attr("selected","selected");
			$("#child_2_guardian_email").val("example@example.com");
			$("#child_2_photo option:eq(1)").attr("selected","selected");
			$("#child_2_medical option:eq(1)").attr("selected","selected");
		
			
			$("#cforms43form > .cf-fs4 input").val(" ");
			$("#child_3_birth_date option:eq(1)").attr("selected","selected");
			$("#child_3_birth_month option:eq(1)").attr("selected","selected");
			$("#child_3_birth_year option:eq(1)").attr("selected","selected");
			$("#child_3_gender option:eq(1)").attr("selected","selected");
			$("#child_3_grade_entering option:eq(1)").attr("selected","selected");
			$("#child_3_guardian_email").val("example@example.com");
			$("#child_3_photo option:eq(1)").attr("selected","selected");
			$("#child_3_medical option:eq(1)").attr("selected","selected");
			
			$("#cforms43form > .cf-fs5 input").val(" ");
			$("#child_4_birth_date option:eq(1)").attr("selected","selected");
			$("#child_4_birth_month option:eq(1)").attr("selected","selected");
			$("#child_4_birth_year option:eq(1)").attr("selected","selected");
			$("#child_4_gender option:eq(1)").attr("selected","selected");
			$("#child_4_grade_entering option:eq(1)").attr("selected","selected");
			$("#child_4_guardian_email").val("example@example.com");
			$("#child_4_photo option:eq(1)").attr("selected","selected");
			$("#child_4_medical option:eq(1)").attr("selected","selected");
			
			$("#cforms43form > .cf-fs6 input").val(" ");
			$("#child_5_birth_date option:eq(1)").attr("selected","selected");
			$("#child_5_birth_month option:eq(1)").attr("selected","selected");
			$("#child_5_birth_year option:eq(1)").attr("selected","selected");
			$("#child_5_gender option:eq(1)").attr("selected","selected");
			$("#child_5_grade_entering option:eq(1)").attr("selected","selected");
			$("#child_5_guardian_email").val("example@example.com");
			$("#child_5_photo option:eq(1)").attr("selected","selected");
			$("#child_5_medical option:eq(1)").attr("selected","selected");
        }

        if (message_index == 2)
        {
			//$("#cforms43form > .cf-fs2").show();
			$("#cforms43form > .cf-fs3").show();
			$("#cforms43form > .cf-fs4").hide();
			$("#cforms43form > .cf-fs5").hide();
			$("#cforms43form > .cf-fs6").hide();
			
			$("#cforms43form > .cf-fs3 input").val("");
			$("#child_2_birth_date option:eq(0)").attr("selected","selected");
			$("#child_2_birth_month option:eq(0)").attr("selected","selected");
			$("#child_2_birth_year option:eq(0)").attr("selected","selected");
			$("#child_2_gender option:eq(0)").attr("selected","selected");
			$("#child_2_grade_entering option:eq(0)").attr("selected","selected");
			$("#child_2_guardian_email").val("");
			$("#child_2_photo option:eq(0)").attr("selected","selected");
			$("#child_2_medical option:eq(0)").attr("selected","selected");
			$("#child_2_volunteer option:eq(0)").attr("selected","selected");
			$("#child_2_sbc option:eq(0)").attr("selected","selected");
			
			$("#cforms43form > .cf-fs4 input").val(" ");
			$("#child_3_birth_date option:eq(1)").attr("selected","selected");
			$("#child_3_birth_month option:eq(1)").attr("selected","selected");
			$("#child_3_birth_year option:eq(1)").attr("selected","selected");
			$("#child_3_gender option:eq(1)").attr("selected","selected");
			$("#child_3_grade_entering option:eq(1)").attr("selected","selected");
			$("#child_3_guardian_email").val("example@example.com");
			$("#child_3_photo option:eq(1)").attr("selected","selected");
			$("#child_3_medical option:eq(1)").attr("selected","selected");
			
			$("#cforms43form > .cf-fs5 input").val(" ");
			$("#child_4_birth_date option:eq(1)").attr("selected","selected");
			$("#child_4_birth_month option:eq(1)").attr("selected","selected");
			$("#child_4_birth_year option:eq(1)").attr("selected","selected");
			$("#child_4_gender option:eq(1)").attr("selected","selected");
			$("#child_4_grade_entering option:eq(1)").attr("selected","selected");
			$("#child_4_guardian_email").val("example@example.com");
			$("#child_4_photo option:eq(1)").attr("selected","selected");
			$("#child_4_medical option:eq(1)").attr("selected","selected");
			
			$("#cforms43form > .cf-fs6 input").val(" ");
			$("#child_5_birth_date option:eq(1)").attr("selected","selected");
			$("#child_5_birth_month option:eq(1)").attr("selected","selected");
			$("#child_5_birth_year option:eq(1)").attr("selected","selected");
			$("#child_5_gender option:eq(1)").attr("selected","selected");
			$("#child_5_grade_entering option:eq(1)").attr("selected","selected");
			$("#child_5_guardian_email").val("example@example.com");
			$("#child_5_photo option:eq(1)").attr("selected","selected");
			$("#child_5_medical option:eq(1)").attr("selected","selected");
        }

        if (message_index == 3)
        {
			//$("#cforms43form > .cf-fs2").show();
			$("#cforms43form > .cf-fs3").show();
			$("#cforms43form > .cf-fs4").show();
			$("#cforms43form > .cf-fs5").hide();
			$("#cforms43form > .cf-fs6").hide();
			
			$("#cforms43form > .cf-fs4 input").val("");
			$("#child_3_birth_date option:eq(0)").attr("selected","selected");
			$("#child_3_birth_month option:eq(0)").attr("selected","selected");
			$("#child_3_birth_year option:eq(0)").attr("selected","selected");
			$("#child_3_gender option:eq(0)").attr("selected","selected");
			$("#child_3_grade_entering option:eq(0)").attr("selected","selected");
			$("#child_3_guardian_email").val("");
			$("#child_3_photo option:eq(0)").attr("selected","selected");
			$("#child_3_medical option:eq(0)").attr("selected","selected");
			$("#child_3_volunteer option:eq(0)").attr("selected","selected");
			$("#child_3_sbc option:eq(0)").attr("selected","selected");
			
			$("#cforms43form > .cf-fs5 input").val(" ");
			$("#child_4_birth_date option:eq(1)").attr("selected","selected");
			$("#child_4_birth_month option:eq(1)").attr("selected","selected");
			$("#child_4_birth_year option:eq(1)").attr("selected","selected");
			$("#child_4_gender option:eq(1)").attr("selected","selected");
			$("#child_4_grade_entering option:eq(1)").attr("selected","selected");
			$("#child_4_guardian_email").val("example@example.com");
			$("#child_4_photo option:eq(1)").attr("selected","selected");
			$("#child_4_medical option:eq(1)").attr("selected","selected");
			
			$("#cforms43form > .cf-fs6 input").val(" ");
			$("#child_5_birth_date option:eq(1)").attr("selected","selected");
			$("#child_5_birth_month option:eq(1)").attr("selected","selected");
			$("#child_5_birth_year option:eq(1)").attr("selected","selected");
			$("#child_5_gender option:eq(1)").attr("selected","selected");
			$("#child_5_grade_entering option:eq(1)").attr("selected","selected");
			$("#child_5_guardian_email").val("example@example.com");
			$("#child_5_photo option:eq(1)").attr("selected","selected");
			$("#child_5_medical option:eq(1)").attr("selected","selected");
        }

        if (message_index == 4)
        {
			//$("#cforms43form > .cf-fs2").show();
			$("#cforms43form > .cf-fs3").show();
			$("#cforms43form > .cf-fs4").show();
			$("#cforms43form > .cf-fs5").show();
			$("#cforms43form > .cf-fs6").hide();
			
			$("#cforms43form > .cf-fs5 input").val("");
			$("#child_4_birth_date option:eq(0)").attr("selected","selected");
			$("#child_4_birth_month option:eq(0)").attr("selected","selected");
			$("#child_4_birth_year option:eq(0)").attr("selected","selected");
			$("#child_4_gender option:eq(0)").attr("selected","selected");
			$("#child_4_grade_entering option:eq(0)").attr("selected","selected");
			$("#child_4_guardian_email").val("");
			$("#child_4_photo option:eq(0)").attr("selected","selected");
			$("#child_4_medical option:eq(0)").attr("selected","selected");
			$("#child_4_volunteer option:eq(0)").attr("selected","selected");
			$("#child_4_sbc option:eq(0)").attr("selected","selected");
			
			$("#cforms43form > .cf-fs6 input").val(" ");
			$("#child_5_birth_date option:eq(1)").attr("selected","selected");
			$("#child_5_birth_month option:eq(1)").attr("selected","selected");
			$("#child_5_birth_year option:eq(1)").attr("selected","selected");
			$("#child_5_gender option:eq(1)").attr("selected","selected");
			$("#child_5_grade_entering option:eq(1)").attr("selected","selected");
			$("#child_5_guardian_email").val("example@example.com");
			$("#child_5_photo option:eq(1)").attr("selected","selected");
			$("#child_5_medical option:eq(1)").attr("selected","selected");
        }

        if (message_index == 5)
        {
			//$("#cforms43form > .cf-fs2").show();
			$("#cforms43form > .cf-fs3").show();
			$("#cforms43form > .cf-fs4").show();
			$("#cforms43form > .cf-fs5").show();
			$("#cforms43form > .cf-fs6").show();
			
			$("#cforms43form > .cf-fs6 input").val("");
			$("#child_5_birth_date option:eq(0)").attr("selected","selected");
			$("#child_5_birth_month option:eq(0)").attr("selected","selected");
			$("#child_5_birth_year option:eq(0)").attr("selected","selected");
			$("#child_5_gender option:eq(0)").attr("selected","selected");
			$("#child_5_grade_entering option:eq(0)").attr("selected","selected");
			$("#child_5_guardian_email").val("");
			$("#child_5_photo option:eq(0)").attr("selected","selected");
			$("#child_5_medical option:eq(0)").attr("selected","selected");
			$("#child_5_volunteer option:eq(0)").attr("selected","selected");
			$("#child_5_sbc option:eq(0)").attr("selected","selected");
        }
	});
//end vbx

//begin womens bible studies
$("#cforms29form > .cf-fs2").hide();
$("#cforms29form > .cf-fs3").hide();
$("#cforms29form > .cf-fs4").hide();
$("#cforms29form > .cf-fs5").hide();
$("#cforms29form > .cf-fs6").hide();

$("#cforms29form > .cf-fs2 input").val(" ");
$("#cforms29form > .cf-fs3 input").val(" ");
$("#cforms29form > .cf-fs4 input").val(" ");
$("#cforms29form > .cf-fs5 input").val(" ");
$("#cforms29form > .cf-fs6 input").val(" ");

$("#Child-Care").change(function() 
    {
        message_index = $("#Child-Care").val();
 
        if (message_index == 0)
        {
			$("#cforms29form > .cf-fs2").hide();
			$("#cforms29form > .cf-fs3").hide();
			$("#cforms29form > .cf-fs4").hide();
			$("#cforms29form > .cf-fs5").hide();
			$("#cforms29form > .cf-fs6").hide();

			$("#cforms29form > .cf-fs2 input").val(" ");
			$("#cforms29form > .cf-fs3 input").val(" ");
			$("#cforms29form > .cf-fs4 input").val(" ");
			$("#cforms29form > .cf-fs5 input").val(" ");
			$("#cforms29form > .cf-fs6 input").val(" ");
        }
 
        if (message_index == 1)
        {
			$("#cforms29form > .cf-fs2").show();
			$("#cforms29form > .cf-fs3").hide();
			$("#cforms29form > .cf-fs4").hide();
			$("#cforms29form > .cf-fs5").hide();
			$("#cforms29form > .cf-fs6").hide();

			$("#cforms29form > .cf-fs2 input").val("");
			$("#cforms29form > .cf-fs3 input").val(" ");
			$("#cforms29form > .cf-fs4 input").val(" ");
			$("#cforms29form > .cf-fs5 input").val(" ");
			$("#cforms29form > .cf-fs6 input").val(" ");
        }
 
        if (message_index == 2)
        {
			$("#cforms29form > .cf-fs2").show();
			$("#cforms29form > .cf-fs3").show();
			$("#cforms29form > .cf-fs4").hide();
			$("#cforms29form > .cf-fs5").hide();
			$("#cforms29form > .cf-fs6").hide();

			$("#cforms29form > .cf-fs2 input").val("");
			$("#cforms29form > .cf-fs3 input").val("");
			$("#cforms29form > .cf-fs4 input").val(" ");
			$("#cforms29form > .cf-fs5 input").val(" ");
			$("#cforms29form > .cf-fs6 input").val(" ");
        }
 
        if (message_index == 3)
        {
			$("#cforms29form > .cf-fs2").show();
			$("#cforms29form > .cf-fs3").show();
			$("#cforms29form > .cf-fs4").show();
			$("#cforms29form > .cf-fs5").hide();
			$("#cforms29form > .cf-fs6").hide();

			$("#cforms29form > .cf-fs2 input").val("");
			$("#cforms29form > .cf-fs3 input").val("");
			$("#cforms29form > .cf-fs4 input").val("");
			$("#cforms29form > .cf-fs5 input").val(" ");
			$("#cforms29form > .cf-fs6 input").val(" ");
        }
 
        if (message_index == 4)
        {
			$("#cforms29form > .cf-fs2").show();
			$("#cforms29form > .cf-fs3").show();
			$("#cforms29form > .cf-fs4").show();
			$("#cforms29form > .cf-fs5").show();
			$("#cforms29form > .cf-fs6").hide();

			$("#cforms29form > .cf-fs2 input").val("");
			$("#cforms29form > .cf-fs3 input").val("");
			$("#cforms29form > .cf-fs4 input").val("");
			$("#cforms29form > .cf-fs5 input").val("");
			$("#cforms29form > .cf-fs6 input").val(" ");
        }
 
        if (message_index == 5)
        {
			$("#cforms29form > .cf-fs2").show();
			$("#cforms29form > .cf-fs3").show();
			$("#cforms29form > .cf-fs4").show();
			$("#cforms29form > .cf-fs5").show();
			$("#cforms29form > .cf-fs6").show();

			$("#cforms29form > .cf-fs2 input").val("");
			$("#cforms29form > .cf-fs3 input").val("");
			$("#cforms29form > .cf-fs4 input").val("");
			$("#cforms29form > .cf-fs5 input").val("");
			$("#cforms29form > .cf-fs6 input").val("");
        }
	
	
	});
	
//end womens bible studies


//begin awana code
$("#cforms27form > .cf-fs4").show();
$("#cforms27form > .cf-fs5").hide();
$("#cforms27form > .cf-fs6").hide();
$("#cforms27form > .cf-fs7").hide();

$("#cforms27form > .cf-fs4 input").val("");
$("#cforms27form > .cf-fs5 input").val(" ");
$("#cforms27form > .cf-fs6 input").val(" ");
$("#cforms27form > .cf-fs7 input").val(" ");

var pathname = window.location.pathname;
$("#pp_custom").val(pathname);
$("#pp_custom_2").val(pathname);

$("#number_of_children").change(function() 
    {
 
        message_index = $("#number_of_children").val();
 
        if (message_index == 1)
        {
        	$("#cforms27form > .cf-fs4").show();
        	$("#cforms27form > .cf-fs5").hide();
        	$("#cforms27form > .cf-fs6").hide();
        	$("#cforms27form > .cf-fs7").hide();

			$("#cforms27form > .cf-fs5 input").val(" ");
			$("#cforms27form > .cf-fs6 input").val(" ");
			$("#cforms27form > .cf-fs7 input").val(" ");
        }
        if (message_index == 2)
        {
        	$("#cforms27form > .cf-fs4").show();
        	$("#cforms27form > .cf-fs5").show();
        	$("#cforms27form > .cf-fs6").hide();
        	$("#cforms27form > .cf-fs7").hide();

			$("#cforms27form > .cf-fs5 input").val("");
			$("#cforms27form > .cf-fs6 input").val(" ");
			$("#cforms27form > .cf-fs7 input").val(" ");
        }
        if (message_index == 3)
        {
        	$("#cforms27form > .cf-fs4").show();
        	$("#cforms27form > .cf-fs5").show();
        	$("#cforms27form > .cf-fs6").show();
        	$("#cforms27form > .cf-fs7").hide();
        	
			$("#cforms27form > .cf-fs6 input").val("");
			$("#cforms27form > .cf-fs7 input").val(" ");
        }
        if (message_index == 4)
        {
        	$("#cforms27form > .cf-fs4").show();
        	$("#cforms27form > .cf-fs5").show();
        	$("#cforms27form > .cf-fs6").show();
        	$("#cforms27form > .cf-fs7").show();
        	
			$("#cforms27form > .cf-fs7 input").val("");
        }
    });
//end awana code
$(".linklove").hide();

$('#s1').after('<div id="nav1">').cycle({ 
    fx:     'fade',
    timeout: 6000, 
    pager:  '#nav1'
});
$('ul.sidebar_nav li ul').addClass('hidden');
$('li.current_page_item > *').removeClass('hidden');

$(".cal_link").click(function () {
      $(this).css({'text-decoration' : 'yellow', 'font-weight' : 'bolder'});
    }, function () {
      var cssObj = {
        'background-color' : '#ddd',
        'font-weight' : '',
        'color' : 'rgb(0,40,244)'
      }
      $(this).css(cssObj);
    });
$("#cal_nav").clone().insertBefore("#cal_list");
 });

function calToggle(calObj)
{
	$("#"+calObj).slideToggle("slow");
}
function calBoxToggle(showMe)
{
	$(".cal_events:visible").fadeOut("normal", function(){$("."+showMe).fadeIn("slow")});	
}

Date.format = 'mm/dd/yyyy';
$(function()
{
	$('#cf35_field_6').datePicker({
		clickInput:true,
		startDate:'01/01/1996'
		})
});