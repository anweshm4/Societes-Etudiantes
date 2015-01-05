<!DOCTYPE html>
	<head>
		<link rel="stylesheet" href="css/style.css">
		<link href='http://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
		<title> Submit Form </title>
	</head>

	<body>

	<?php
		include "nav.php";
		$con=mysqli_connect("localhost","root","") or die("not connected");
		echo"Connection Established";
		$db=mysqli_select_db($con, "Hobbyclub")or die('database not changed');
		echo'<br>'."Connection To Database Established"."<br>";


		echo $mentorid=$_POST['mentorid'];
		echo $mentorname=$_POST['mentorname'];
		echo $emailid=$_POST['emailid'];
		echo $clubid=$_POST['clubid'];
		
		$query=" INSERT INTO mentor (mentorid, mentorname, emailid, clubid) VALUES ($mentorid,'$mentorname','$emailid', $clubid);";
		mysqli_query($con, $query) or die(mysqli_error());
		header('Location: viewmentor.php');
	?>
