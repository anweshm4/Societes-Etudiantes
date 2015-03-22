<!DOCTYPE html>
<html lang="en">
	
	<meta charset="utf-8">
	<head>
		<link rel="stylesheet" href="css/style.css">
		<link href='http://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="css/calendar.css" media="screen">
		<title> Events </title>
	</head>

	<?php
		include"guestuseraccess.php";
	?>


	<body>


		<div id="calendar"></div>

	<script src="js/jquery.min.js"></script>
	<script src="js/jquery-ui-datepicker.min.js"></script>
	<script>

		$('#calendar').datepicker({
			onSelect: function(date)
			{				
				xmlhttp=new XMLHttpRequest();
				xmlhttp.onreadystatechange=function()
				{
					if (xmlhttp.readyState==4 && xmlhttp.status==200)
					{
						document.getElementById("result").innerHTML=xmlhttp.responseText;
					}
				}

				xmlhttp.open("GET","printevent.php?date="+date);
				xmlhttp.send();
			},
			dateFormat: 'yy-mm-dd',
			inline: true,
			selectWeek:true,
			firstDay: 1,
			showOtherMonths: true,
			dayNamesMin: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat']
			});


</script>
	</script>

	<div class='eventdetails'>
		<div> 
			<p class='eventheader'> Event Details </p>
			<hr>
			<div id="result" class='eventdata'> 
			</div>
		</div>
	</div>
	
	</body>

	</html>