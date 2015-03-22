<!DOCTYPE html>
	<head>
		<link rel="stylesheet" href="css/style.css">
		<link href='http://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
		<title> Submit Form </title>

		<link rel="stylesheet" href="css/jquery-ui.css">
		<script src="js/jquery-1.10.2.js"></script>
		<script src="js/jquery-ui.js"></script>

		
	</head>

	<body>

	<?php
		include "adminnav.php";
		$con=mysqli_connect("localhost","admin","hobbyclub") or die("not connected");
		echo"Connection Established";
		$db=mysqli_select_db($con, "Hobbyclub")or die('database not changed');
		echo'<br>'."Connection To Database Established"."<br>";


		echo $name=$_POST['sessionname'];
		echo $clubname=$_POST['selectclub'];
		echo $date=$_POST['date'];

		$sql="SELECT clubid from club where clubname='$clubname'";
		$result = mysqli_query($con, $sql);

		while($row = mysqli_fetch_assoc($result))
    		{
    			echo $clubid= $row['clubid'];
    		}
		
		$query=" INSERT INTO session (name, clubid, sessiondate) VALUES ('$name', $clubid, '$date');";
		mysqli_query($con, $query) or die(mysqli_error());
		header('Location: viewsession.php');
	?>
 