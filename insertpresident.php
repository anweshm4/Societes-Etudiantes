<!DOCTYPE html>
	<head>
		<link rel="stylesheet" href="css/style.css">
		<link href='http://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
		<title> Appoint President </title>
	</head>

	<body>

	<?php
		include "adminnav.php";
		$con=mysqli_connect("localhost","admin","hobbyclub") or die("not connected");
		echo"Connection Established";
		$db=mysqli_select_db($con, "Hobbyclub")or die('database not changed');
		echo'<br>'."Connection To Database Established"."<br>";

		echo $registerno=$_GET['id'];
		$sql = "SELECT clubid FROM student where registerno=$registerno";
		$result = mysqli_query($con, $sql);

		while($row = mysqli_fetch_assoc($result))
    	{	
    		echo $clubid=$row["clubid"];
			$query=" INSERT into president (registerno, clubid) VALUES ($registerno, $clubid);";
			mysqli_query($con, $query) or die(mysqli_error());
		}

		header('Location: viewpresident.php');
	?>
