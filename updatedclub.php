<!DOCTYPE html>
	<head>
		<link rel="stylesheet" href="css/style.css">
		<link href='http://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
		<title> Club Records </title>
	</head>

	<body>
	<?php
		include "nav.php";
		$con=mysqli_connect("localhost","root","") or die("not connected");
		//echo"Connection Established";
		$db=mysqli_select_db($con, "Hobbyclub")or die('database not changed');
		//echo'<br>'."Connection To Database Established"."<br>";

		echo $clubid=$_POST['clubid'];
		echo $clubname=$_POST['clubname'];
		echo $classroomid=$_POST['classroomid'];

		$query=" UPDATE club SET clubname='$clubname', classroomid=$classroomid where clubid=$clubid;";
		mysqli_query($con, $query) or die(mysqli_error());
		header('Location: viewclub.php');
	?>