<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Code practice for TBS</title>
	<script src="<?php echo base_url('assets/jquery.js'); ?>" type="text/javascript"></script>
	<script> 
	var base_url = '<?php echo base_url(); ?>';
	</script>
</head>
<body>

<div id="container">
	<div id="body">
		<form action="#">
		  Enter Text:<br>
		  <input id="text_value"  type="text" name="enter_text" value=""><br><br>
		  <input id="create_log" type="button" value="Create Log">
		</form>
	</div>
</div>

</body>
<script>
/**
 * Function fires on click of Create Log Button.
 *
 * @success (data): message if the log is made or not.
 */
$( "#create_log" ).click(function() {
	
	var text_value = $('#text_value').val(); // value fetched form text field
	
	if(text_value == ''){
		alert('Please Enter text');
	}else{
		$.ajax({
			url: base_url + 'code/createLog',
			type:'POST',
			data:{
				text_value:text_value
			},
			success:function(data){
				alert(data);
			}
		}) 
	}
	
});
</script>
</html>