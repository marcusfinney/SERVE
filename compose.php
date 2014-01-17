<?php 
session_start();
$mydate				= getdate(date("U"));
$date 				= "$mydate[weekday], $mydate[month] $mydate[mday], $mydate[year]";

echo '

<div class="container">
	<div class="row">
		<div class="col-sm-4">
		<h3><m style="margin-left:31px;">Send Message</m></h3>
		<hr>
		<address class="">
			<strong style="margin-left:31px;" >Name:</strong> <a href="mailto:#"> '.$_SESSION["userrecord"]["firstName"].' '.$_SESSION["userrecord"]["lastName"].'</a><br>
			<strong style="margin-left:31px;" >Date:</strong> '.$date.'
		</address>
	</div>
<hr>    
<div class="col-sm-8 contact-form" style="margin-top:30px;">
	<form id="composeForm" method="post" class="form" role="form" action="sendMessage.php">
		<div class="row">
			<div class="col-xs-6 col-md-6 form-group">
				<input class="form-control span6" style="margin-left:31px;" name="recipient" placeholder="Send to..." type="text" required autofocus>
			</div>
			<div>
				<input class="form-control span6" style="margin-left:31px;" name="subject" placeholder="Subject" type="text" required></br>
			</div>
			<textarea class="form-control span6" style="margin-left:31px;" name="message" placeholder="Message" rows="8" required></textarea></br>
			<button id="submit" class="btn btn-inverse span6" type="submit"><i class="icon-edit"></i> Send Message</button>
		</div>
	</form>
</div>

<script>
	$("#composeForm").submit(function(e) {
		var postData = $(this).serializeArray();
    	var formURL = $(this).attr("action");
		$.ajax({
     		url: formURL,
     		type: "POST",
      		data: postData,
      		success: function(data, textStatus, jqXHR) 
      		{alert("Your message has been sent!")}
      		error: function(jqXHR, textStatus, errorThrown) 
			{alert("Sorry, there was an error sending your message...")}
    		});	
    		e.preventDefault();
    });
    $("#composeForm").submit();
    
</script>
'; 
?>