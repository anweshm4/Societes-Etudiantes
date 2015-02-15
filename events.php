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
		include "studentnav.php";
		$con=mysqli_connect("localhost","admin","hobbyclub") or die("not connected");
		//echo"Connection Established";
		$db=mysqli_select_db($con, "Hobbyclub")or die('database not changed');
		//echo'<br>'."Connection To Database Established"."<br>";
	?>


	<body>


		<div id="calendar"></div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script src="js/jquery-ui-datepicker.min.js"></script>
	<script>
		$('#calendar').datepicker({
			inline: true,
			firstDay: 1,
			showOtherMonths: true,
			dayNamesMin: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat']
		});
	</script>

	<div class='showevents'> 
	
	</body>

	</html>