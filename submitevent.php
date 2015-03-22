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
		echo "<br>";

		echo $eventname=$_POST['eventname'];
		echo $clubname=$_POST['selectclub'];
		echo $venue=$_POST['venue'];
		echo $date=$_POST['date'];
		echo $registrationtype=$_POST['registrationtype'];
		echo $registrationfees=$_POST['registrationfees'];

		$sql="SELECT clubid from club where clubname='$clubname'";
		$result = mysqli_query($con, $sql);

		while($row = mysqli_fetch_assoc($result))
    		{
    			echo $clubid= $row['clubid'];
    		}
    	$query=" INSERT INTO event (eventname, clubid, venue, date, registrationtype, registrationfees) VALUES ('$eventname',$clubid, '$venue', '$date', '$registrationtype',$registrationfees);";
		mysqli_query($con, $query) or die(mysqli_error());
		header('Location: viewevent.php');


