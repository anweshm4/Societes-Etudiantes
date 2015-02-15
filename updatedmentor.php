<!DOCTYPE html>
	<head>
		<link rel="stylesheet" href="css/style.css">
		<link href='http://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
		<title> Student Records </title>
	</head>

	<body>
	<?php
		include "adminnav.php";
		$con=mysqli_connect("localhost","admin","hobbyclub") or die("not connected");
		//echo"Connection Established";
		$db=mysqli_select_db($con, "Hobbyclub")or die('database not changed');
		//echo'<br>'."Connection To Database Established"."<br>";

		echo $mentorid=$_POST['mentorid'];
		echo $mentorname=$_POST['name'];
		echo $clubid=$_POST['clubid'];
		echo $emailid=$_POST['emailid'];

		$query=" UPDATE mentor SET mentorname='$mentorname', clubid=$clubid, emailid='$emailid' where mentorid=$mentorid;";
		mysqli_query($con, $query) or die(mysqli_error());
		header('Location: viewmentor.php');
	?>