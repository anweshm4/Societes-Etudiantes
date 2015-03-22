<!DOCTYPE html>
	<head>
		<link rel="stylesheet" href="css/style.css">
		<link href='http://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
		<title> Student Records </title>
	</head>

	<body>
	<?php
		include "studentnav.php";
		$con=mysqli_connect("localhost","admin","hobbyclub") or die("not connected");
		//echo"Connection Established";
		$db=mysqli_select_db($con, "Hobbyclub")or die('database not changed');
		//echo'<br>'."Connection To Database Established"."<br>";

		sec_session_start();
    	$username=$_SESSION['username'];
    	echo "<br> <br>".$name=substr($username,0,3);
    	echo "<br> <br>".$clubname=$_POST['selectclub'];
    	$sql="SELECT registerno from student where name like '$name%'";
    	$result = mysqli_query($con, $sql);

		while($row = mysqli_fetch_assoc($result))
    		{
    			echo $registerno= $row['registerno'];
    		}

		$sql="SELECT clubid from club where clubname='$clubname'";
		$result = mysqli_query($con, $sql);

		while($row = mysqli_fetch_assoc($result))
    		{
    			echo $clubid= $row['clubid'];
    		}

		
		$query=" UPDATE student SET clubid=$clubid where registerno=$registerno;";
		mysqli_query($con, $query) or die(mysqli_error());
		header('Location: ownclub.php');
	?>