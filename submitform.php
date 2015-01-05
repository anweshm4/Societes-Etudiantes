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


		echo $registerno=$_POST['registerno'];
		echo $name=$_POST['name'];
		echo $hobbyid=$_POST['hobbyid'];
		echo $emailid=$_POST['emailid'];
		echo $joindate=$_POST['date'];
		echo $agp=$_POST['agp'];
		echo $ccgp=$_POST['ccgp'];

		$query=" INSERT INTO student (registerno, name, clubid, emailid, joindate, AGP, CCGP) VALUES ($registerno,'$name',$hobbyid,'$emailid','$joindate', $agp, $ccgp);";
		mysqli_query($con, $query) or die(mysqli_error());
		header('Location: viewstudent.php');
	?>
