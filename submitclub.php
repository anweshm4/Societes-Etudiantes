<!DOCTYPE html>
	<head>
		<link rel="stylesheet" href="css/style.css">
		<link href='http://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
		<title> Submit Form </title>
	</head>

	<body>

	<?php
		include "adminnav.php";
		$con=mysqli_connect("localhost","admin","hobbyclub") or die("not connected");
		//echo"Connection Established";
		$db=mysqli_select_db($con, "Hobbyclub")or die('database not changed');
		//echo'<br>'."Connection To Database Established"."<br>";


		 echo $clubname=$_POST['clubname'];
		 echo $classroom=$_POST['classroomid'];

		$query=" INSERT INTO club (clubname, classroomid) VALUES ('$clubname', $classroom);";
		if(!mysqli_query($con, $query)) 
		{
			echo "Error in Query : ".(mysqli_error($con));
		}
		else
			header('Location: viewclub.php');
		
	?>
