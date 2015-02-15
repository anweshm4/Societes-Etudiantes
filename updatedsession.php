<!DOCTYPE html>
	<head>
		<link rel="stylesheet" href="css/style.css">
		<link href='http://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
		<title> Session Records </title>
	</head>

	<body>
	<?php
		include "adminnav.php";
		$con=mysqli_connect("localhost","admin","hobbyclub") or die("not connected");
		//echo"Connection Established";
		$db=mysqli_select_db($con, "Hobbyclub")or die('database not changed');
		//echo'<br>'."Connection To Database Established"."<br>";

		echo $sessionid=$_POST['sessionid'];
		echo $name=$_POST['name'];
		echo $clubid=$_POST['clubid'];
		echo $date=$_POST['sessiondate'];

		$query=" UPDATE session SET name='$name', clubid=$clubid, sessiondate='$date' where sessionid=$sessionid;";
		mysqli_query($con, $query) or die(mysqli_error());
		header('Location: viewsession.php');
	?>