<!DOCTYPE html>
	<head>
		<link rel="stylesheet" href="css/style.css">
		<link href='http://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
		<title> Event Records </title>
	</head>

	<body>
	<?php
		include "adminnav.php";
		$con=mysqli_connect("localhost","admin","hobbyclub") or die("not connected");
		//echo"Connection Established";
		$db=mysqli_select_db($con, "Hobbyclub")or die('database not changed');
		//echo'<br>'."Connection To Database Established"."<br>";

		echo "<br><br><br>".$eventid=$_POST['eventid'];
		echo $eventname=$_POST['eventname'];
		echo $venue=$_POST['venue'];
		echo $date=$_POST['date'];
		echo $registrationtype=$_POST['registrationtype'];
		echo $registrationfees=$_POST['registrationfees'];

		$query=" UPDATE event SET eventname='$eventname',  venue='$venue', date='$date', registrationtype='$registrationtype', registrationfees=$registrationfees where eventid=$eventid;";
		mysqli_query($con, $query) or die(mysqli_error());
		header('Location: viewevent.php');
	?>