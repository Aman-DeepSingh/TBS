<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Code practice for TBS</title>
	 <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	 
	<script src="<?php echo base_url('assets/jquery.js'); ?>" type="text/javascript"></script>
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<script> 
	var base_url = '<?php echo base_url(); ?>';
	</script>

</head>
<body>

<div id="container">
	<div id="body">
		<form onsubmit = "return false">
		  Enter Text:<br>
		  <input id="text_value"  type="text" name="enter_text" value=""><br><br>
		  <input id="create_log" type="button" value="Create Log">
		</form>
	</div>
</div>
<!-- ALERT BOX STARTS -->
<div id="dialog" title="Alert !">
  <p id="alert_text"></p>
</div>
<!-- ALERT BOX ENDS -->
</body>
<script>
$(function() {
    $( "#dialog" ).dialog({
	  autoOpen: false
	});
});
/**
 * Function fires on click of Create Log Button.
 *
 * @success (data): message if the log is made or not.
 */
$( "#create_log" ).click(function() {
	
	var text_value = $('#text_value').val(); // value fetched form text field
	
	if(text_value == ''){
		$( "#alert_text" ).text("Please Enter text");
		$( "#dialog" ).dialog("open");
	}else{
		$.ajax({
			url: base_url + 'code/createLog',
			type:'POST',
			data:{
				text_value:text_value
			},
			success:function(data){
				$( "#alert_text" ).text(data);
				$( "#dialog" ).dialog("open");
			}
		}) 
	}
	
});
</script>
</html>