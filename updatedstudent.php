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

		echo $registerno=$_POST['registerno'];
		echo $studentname=$_POST['name'];
		echo $clubid=$_POST['clubid'];
		echo $emailid=$_POST['emailid'];
		echo $joindate=$_POST['joindate'];
		echo $agp=$_POST['agp'];
		echo $ccgp=$_POST['ccgp'];

		$query=" UPDATE student SET name='$studentname', clubid=$clubid, emailid='$emailid', joindate='$joindate', AGP=$agp, CCGP=$ccgp where registerno=$registerno;";
		mysqli_query($con, $query) or die(mysqli_error());
		header('Location: viewstudent.php');
	?>